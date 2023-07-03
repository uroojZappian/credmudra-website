var base_url = "https://gateway.credmudra.com/";

function leadStatus(accessToken, leadId) {

    var settings = {
        url: base_url + "users/lead-status",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                leadId: leadId,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            console.log(response);
            var buyer_info = response.data;
            var len = buyer_info.length;
            submitprogress(0);
            if (len > 0) {
                let preApprovedAmount = buyer_info[0].preApprovedAmount;
                let name = buyer_info[0].name;
                let redirectionLink = buyer_info[0].redirectionLink;
                console.log(preApprovedAmount, buyer_info);
                webengage.track("Lead Status", {
                    Lender: name,
                    LeadID: leadId
                });
				webengage.user.logout();
                window.location.href =  "congratulation-submit-page.php?PRE_AMNT=" + preApprovedAmount + "&NAME=" + name + "&RED_URL=" + redirectionLink;
            } else {
                webengage.track("Lead Status", {
                    Lender: "Exit Page",
                    LeadID: leadId
                });

                window.location.href = "all-credit-types.php?pre_amnt=false";
            }
            

        })
        .fail(function(jqXHR, textStatus) {
            console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    window.location.href = "https://credmudra.com/all-credit-types/?pre_amnt=error";
                }
            }
        });
}

$(".sendOtp").on("click", function() {
    const mobileNo = $("#phone-number").val();

    if ((mobileNo.length === 10) && (mobileNo != '0000000000') && (mobileNo != '1111111111') && (mobileNo != '2222222222') && (mobileNo != '3333333333') && (mobileNo != '4444444444') && (mobileNo != '5555555555') && (mobileNo != '6666666666') && (mobileNo != '7777777777') && (mobileNo != '8888888888') && (mobileNo != '9999999999') && $("#chkterms").is(":checked")) {

        $(".loader").css({ display: "block" });
        var settings = {
            url: base_url + "public/send-otp",
            method: "POST",
            timeout: 0,
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                data: {
                    contactNo: mobileNo,
                    resend: false,
                },
            }),
        };

        $.ajax(settings)
            .done(function(response) {
                $(".mobileNo").html(mobileNo);
                sessionStorage.setItem("userPhone", mobileNo);
                $("#snackbar").html("OTP sent successfully");

                setTimeout(function() {
                    $(".loader").css({ display: "none" });
                }, 5000);

                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 3000);
            })
            .fail(function(jqXHR, textStatus) {
                $("#snackbar").html("Something went wrong");
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 3000);
            });
    } else {
        return false;
        $(".loader").css({ display: "none" });
    }
});

$(".resendOtp").on("click", function() {
    const mobileNo = $("#phone-number").val();
    console.log("resendOtp");
    otpResendTimer();
    if (mobileNo.length === 10) {

        var settings = {
            url: base_url + "public/send-otp",
            method: "POST",
            timeout: 0,
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                data: {
                    contactNo: mobileNo,
                    resend: true,
                },
            }),
        };
        webengage.track("Resend OTP", { phone: mobileNo });
        $.ajax(settings).done(function(response) {
            $(".mobileNo").html(mobileNo);
            sessionStorage.setItem("userPhone", mobileNo);
            $("#snackbar").html("OTP sent successfully");
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        });
    }
});
window.ParsleyValidator.addValidator(
    "otpverify",
    function(value, requirement) {
        console.log('otp');
        var response = false;

        const mobileNo = $("#phone-number").val();

        jQuery.ajax({
            url: base_url + "public/validate-otp",
            data: { username: value },
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            async: false,
            data: JSON.stringify({
                data: {
                    contactNo: mobileNo,
                    otp: value,
                },
            }),
            success: function(data) {
              console.log('apihit');
                if (data.status.code === 200) {
                    sessionStorage.setItem(
                        "sessionData",
                        JSON.stringify(data.data)
                    );

                    response = true;
                } else {
                    sessionStorage.setItem("sessionData", JSON.stringify(data));
                    console.log("bee", data.status);
                    response = false;
                }
            },
            error: function() {
                response = false;
            },
        });
        return response;
    }

).addMessage("en", "otpverify", "Invalid OTP");

window.Parsley.addValidator(
    "panverify",
    function(value, requirement) {
        if (/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(value.toUpperCase())) {
            return true;
        } else {
            return false;
        }
    }
);
window.Parsley.addValidator("notdefault",
    function(value, requirement) {
        if ((value != '0000000000') && (value != '9999999999') && (value != '8888888888') && (value != '1111111111') && (value != '2222222222') && (value != '3333333333') && (value != '4444444444') && (value != '5555555555') && (value != '6666666666') && (value != '7777777777')) {
            return true;
        } else {
            return false;
        }
    }
);



/* add validation for minimum age */
window.Parsley.addValidator("minimumage", {
    validateString: function(value, requirements) {
        // get validation requirments
        var dob = moment(value).format("DD/MM/YYYY");
        var reqs = dob.split("/"),
            day = reqs[0],
            month = reqs[1],
            year = reqs[2];

        // check if date is a valid
        var birthday = new Date(year + "-" + month + "-" + day);

        // Calculate birtday and check if age is greater than 18
        var today = new Date();

        var age = today.getFullYear() - birthday.getFullYear();
        var m = today.getMonth() - birthday.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
            age--;
        }

        return age >= requirements;
    }
});

/* add validation for date format check */
window.Parsley.addValidator("validdate", {
    validateString: function(value) {
        // get validation requirments
        var reqs = value.split("/"),
            day = reqs[0],
            month = reqs[1],
            year = reqs[2];

        // check if date is a valid
        var birthday = new Date(year + "-" + month + "-" + day);
        var isValidDate =
            Boolean(+birthday) && birthday.getDate().toString() === day;

        return isValidDate;
    },
    messages: {
        en: ""
    }
});

//var userSessData = sessionStorage.getItem("sessionData");
//var jsonData = JSON.parse(userSessData);
$(".panSubmit").on("click", function() {
    var userSessData = sessionStorage.getItem("sessionData");
    var jsonData = JSON.parse(userSessData);
    if (jsonData?.token) {
        if (jsonData.token.accessToken) {
            getBanks(jsonData.token.accessToken);
            getBusinessType(jsonData.token.accessToken);
            getCompanyTypes(jsonData.token.accessToken);
            getQualifications(jsonData.token.accessToken);
            getProfession(jsonData.token.accessToken);
            getIndustry(jsonData.token.accessToken);
            getResidence(jsonData.token.accessToken);
            getGender(jsonData.token.accessToken);
            getBusinessOwned(jsonData.token.accessToken);
        }
    } else {
        refreshToken();
    }
    
    // check returning user

    sessionStorage.setItem("returning-user-data", "");
    var pan = $("input[name=pan]").val();
    if (/(^[A-Z]{5}[0-9]{4}[A-Z]{1})$/.test(pan.toUpperCase())) {
        
        var settings = {
            url: base_url + "users/pre-populate-form-data",
            method: "POST",
            timeout: 0,
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + jsonData.token.accessToken,
            },
            data: JSON.stringify({
                data: {
                    panCard: pan.toUpperCase(),
                },
            }),
        };

        $.ajax(settings).done(function(response) {
            console.log(response);

            if (response.status.code === 200) {
                sessionStorage.setItem(
                    "returning-user-data",
                    JSON.stringify(response.data)
                );
                preFillData(response.data);
                $("ul.parsley-errors-list").remove();
            } else {
                var returningUser = false;
            }
        });
    }
    webEngage("LOAN_DETAILS");
});

function getGender(accessToken) {
    var settings = {
        url: base_url + "core/get-gender-types",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            console.log(response);
            var len = response.length;
            $("#gender").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#gender").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getGender(jsonData.token.accessToken);
                }
            }
        });
}

function getResidence(accessToken) {
    var settings = {
        url: base_url + "core/get-residence-types",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("#residence-type").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#residence-type").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getResidence(jsonData.token.accessToken);
                }
            }
        });
}

function getBanks(accessToken) {
    var settings = {
        url: base_url + "core/get-banks",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("select[name='salary_bank_name']").empty();
            $("select[name='business_current_bank_account']").empty();
            $("select[name='business_saving_bank_account']").empty();
            $("select[name='self_employed_current_bank']").empty();
            $("select[name='self_employed_saving_bank_account']").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("select[name='salary_bank_name']").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
                $("select[name='business_current_bank_account']").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
                $("select[name='business_saving_bank_account']").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
                $("select[name='self_employed_current_bank']").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
                $("select[name='self_employed_saving_bank_account']").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getBanks(jsonData.token.accessToken);
                }
            }
        });
}

function getBusinessType(accessToken) {
    var settings = {
        url: base_url + "core/get-business-types",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("#business-type-select").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#business-type-select").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getBusinessType(jsonData.token.accessToken);
                }
            }
        });
}

function getBusinessOwned(accessToken) {
    var settings = {
        url: base_url + "core/get-business-owned",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("#businessOwnedId").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#businessOwnedId").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getBusinessOwned(jsonData.token.accessToken);
                }
            }
        });
}

function getCompanyTypes(accessToken) {
    var settings = {
        url: base_url + "core/get-company-types",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("#company-type").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#company-type").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getCompanyTypes(jsonData.token.accessToken);
                }
            }
        });
}

function getQualifications(accessToken) {
    var settings = {
        url: base_url + "core/get-qualifications",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("#qualification").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#qualification").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getQualifications(jsonData.token.accessToken);
                }
            }
        });
}

function getProfession(accessToken) {
    var settings = {
        url: base_url + "core/get-profession-types",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("#profession-type-select").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#profession-type-select").append(
                    "<option data-val='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getProfession(jsonData.token.accessToken);
                }
            }
        });
}

function getIndustry(accessToken) {
    var settings = {
        url: base_url + "core/get-industry-types",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + accessToken,
        },
        data: JSON.stringify({
            data: {
                name: null,
            },
        }),
    };

    $.ajax(settings)
        .done(function(response) {
            var len = response.length;
            $("#business-industery").empty();
            $("#salaried_industery").empty();
            $.each(response.data, function(item) {
                var id = response.data[item]["id"];
                var name = response.data[item]["name"];

                $("#business-industery").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
                $("#salaried_industery").append(
                    "<option value='" + id + "'>" + name + "</option>"
                );
            });
            $('.selectpicker').selectpicker('refresh');
        })
        .fail(function(jqXHR, textStatus) {
            //console.log(jqXHR);
            if (jqXHR?.status == 401) {
                var callStatus = refreshToken();
                //console.log(callStatus);
                if (callStatus == true) {
                    var userSessData = sessionStorage.getItem("sessionData");
                    var jsonData = JSON.parse(userSessData);
                    getIndustry(jsonData.token.accessToken);
                }
            }
        });
}

function refreshToken() {
    const userSessData = sessionStorage.getItem("sessionData");
    const jsonData = JSON.parse(userSessData);
    if (jsonData) {
        var settings = {
            url: base_url + "public/refresh-token",
            method: "POST",
            timeout: 0,
            headers: {
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                data: {
                    refreshToken: jsonData.token.refreshToken,
                },
            }),
        };

        $.ajax(settings)
            .done(function(response) {
                if (response.status.code == 200) {
                    var apiData = { token: response.data };
                    sessionStorage.setItem("sessionData", JSON.stringify(apiData));
                    return true;
                } else {
                    console.error("invalid refresh token");
                    return false;
                }
            })
            .fail(function(jqXHR, textStatus) {
                console.error("API Call Failed");
                return false;
            });
    }
}

function preFillData(data) {
    $("#first-name").val(data.personalInfo.firstName);
    $("#last-name").val(data.personalInfo.lastName);

    $("#dob").val(
        moment(data.personalInfo.dateOfBirth).format("YYYY-MM-DD")
    );
    $('#gender').selectpicker('val', data.personalInfo.genderId);
    $("#gender").val(data.personalInfo.genderId);

    $(
        "input[name=marital_status][value='" +
        data.personalInfo.maritalStatus +
        "']"
    ).prop("checked", true);

    $("#qualification").selectpicker('val', data.personalInfo.qualificationId);

    $("#qualification").val(data.personalInfo.qualificationId);

    $("#home_address").val(data.address.addressLine1);
    $("#home_landmark").val(data.address.addressLine2);
    $("#home_pincode").val(data.address.pinCode);
    $("#home_pincode").trigger("change");
    $(
        "input[name=employment-type][value='" + data.employmentType + "']"
    ).prop("checked", true);
    $("#residence-type").selectpicker('val', data.address.residenceTypeId);
    $("#residence-type").val(data.address.residenceTypeId);

    $("#years-living").selectpicker('val', data.address.yearsLivingIn);
    $("#years-living").val(data.address.yearsLivingIn);

    $("#credit-card").selectpicker('val', data.others.interestedToGetCreditCard);
    $("#credit-card").val(data.others.interestedToGetCreditCard);

    $("#emi").val(data.others.totalEmiPaidMonthly);
    $("#emiValue").val(data.others.totalEmiPaidMonthly);

    if (data.employmentType == "Salaried") {
        $("#company-type").selectpicker('val', data.employmentDetails.companyTypeId);
        $("#company-type").val(data.employmentDetails.companyTypeId);

        $("#salaried_industery").val(data.employmentDetails.industryTypeId);
        $("#salaried_industery").selectpicker('val', data.employmentDetails.industryTypeId);



        $("input[name=salary_designation]").val(
            data.employmentDetails.designation
        );
        $("input[name=company_name]").val(data.employmentDetails.companyName);
        $("input[name=salary_company_address]").val(data.employmentDetails.companyName);
        $("input[name=salary_pincode]").val(data.employmentDetails.pinCode);
        $("input[name=salary_pincode]").trigger("change");


        $("#years-worked").val(data.employmentDetails.yearsWorkingIn);
        $("#years-worked").selectpicker('val', data.employmentDetails.yearsWorkingIn);


        $("input[name=monthly_salary]").val(
            data.employmentDetails.monthlyProfit
        );

        $("#bank_name").val(data.employmentDetails.bankId);
        $("#bank_name").selectpicker('val', data.employmentDetails.bankId);

        $(
            "input[name=mode-of-salary][value='" +
            data.employmentDetails.salaryMode +
            "']"
        ).prop("checked", true);
    } else if (data.employmentType == "Self Employed") {
        $(
            ".form-section ul[data-hidden-field-name='business_years'] li[data-val='" +
            data.employmentDetails.yearsWorkingIn +
            "']"
        ).trigger("click");
        $("input[name=business_years]").val(
            data.employmentDetails.yearsWorkingIn
        );

        $(
            ".form-section ul[data-hidden-field-name='business-type'] li[data-val='" +
            data.employmentDetails.businessTypeId +
            "']"
        ).trigger("click");
        $("input[name=business-type]").val(
            data.employmentDetails.businessTypeId
        );

        $(
            ".form-section ul[data-hidden-field-name='business-industery'] li[data-val='" +
            data.employmentDetails.industryTypeId +
            "']"
        ).trigger("click");
        $("input[name=business-industery]").val(
            data.employmentDetails.industryTypeId
        );
        $("input[name=business_company_name]").val(
            data.employmentDetails.companyName
        );
        $("input[name=business_pincode]").val(data.employmentDetails.pinCode);
        $("input[name=business_pincode]").trigger("change");
        $("input[name=business_designation]").val(
            data.employmentDetails.designation
        );
        $("input[name=business_monthly_income]").val(
            data.employmentDetails.turnover
        );
        $("input[name=business_monthly_profit]").val(
            data.employmentDetails.monthlyProfit
        );

        $(
            ".form-section ul[data-hidden-field-name='business_current_bank_account'] li[data-val='" +
            data.employmentDetails.currentAccountBankId +
            "']"
        ).trigger("click");
        $("input[name=business_current_bank_account]").val(
            data.employmentDetails.currentAccountBankId
        );
        $(
            ".form-section ul[data-hidden-field-name='business_saving_bank_account'] li[data-val='" +
            data.employmentDetails.savingAccountBankId +
            "']"
        ).trigger("click");
        $("input[name=business_saving_bank_account]").val(
            data.employmentDetails.savingAccountBankId
        );
    } else if (data.employmentType == "Self Employed Professional") {
        $(
            ".form-section ul[data-hidden-field-name='self_business_years'] li[data-val='" +
            data.employmentDetails.yearsWorkingIn +
            "']"
        ).trigger("click");
        $("input[name=self_business_years]").val(
            data.employmentDetails.yearsWorkingIn
        );
        $(
            ".form-section ul[data-hidden-field-name='profession_type'] li[data-val='" +
            data.employmentDetails.professionTypeId +
            "']"
        ).trigger("click");
        $("input[name=profession_type]").val(
            data.employmentDetails.professionTypeId
        );
        $("input[name=self_company_name]").val(
            data.employmentDetails.companyName
        );
        $("input[name=company_pincode]").val(data.employmentDetails.pinCode);
        $("input[name=company_pincode]").trigger("change");
        $("input[name=self_annual_income]").val(
            data.employmentDetails.turnover
        );
        $(
            ".form-section ul[data-hidden-field-name='self_employed_current_bank'] li[data-val='" +
            data.employmentDetails.currentAccountBankId +
            "']"
        ).trigger("click");
        $("input[name=self_employed_current_bank]").val(
            data.employmentDetails.currentAccountBankId
        );
        $(
            ".form-section ul[data-hidden-field-name='self_employed_saving_bank_account'] li[data-val='" +
            data.employmentDetails.savingAccountBankId +
            "']"
        ).trigger("click");
        $("input[name=self_employed_saving_bank_account]").val(
            data.employmentDetails.savingAccountBankId
        );
    }
}


$(".pincode").on("change", function() {
    var pincode = $(this).val();
    var field = $(this).attr("data-field-step");
    const userSessData = sessionStorage.getItem("sessionData");
    const jsonData = JSON.parse(userSessData);
    if (pincode.length === 6) {
        var settings = {
            url: base_url + "location/pincode-address",
            method: "POST",
            timeout: 0,
            headers: {
                Authorization: "Bearer " + jsonData.token.accessToken,
                "Content-Type": "application/json",
            },
            data: JSON.stringify({
                data: {
                    pinCode: pincode,
                },
            }),
        };

        $.ajax(settings).done(function(response) {
            $.each(response.data, function(item) {
                var city = response.data["city"]["name"];
                var city_id = response.data["city"]["id"];
                var state = response.data["state"]["name"];
                var state_id = response.data["state"]["id"];
                var country = response.data["country"]["name"];
                var country_id = response.data["country"]["id"];
                $(".city_" + field).val(city);
                $(".city_" + field).next('ul').empty();
                $(".city_id_" + field).val(city_id);
                $(".state_" + field).val(state);
                $(".state_" + field).next('ul').empty();
                $(".state_id_" + field).val(state_id);
                $(".country_" + field).val(country);
                $(".country_" + field).next('ul').empty();
                $(".country_id_" + field).val(country_id);
            });
        });
    }
});
$(".modal .bar .progress").css("width", "0%");

function submitprogress(e) {
    if (e > 0) {
        if (e >= 30) {
            $(".step[data-desc = 'Complete']").addClass("current");
            $(".progress-text li:nth-child(5)").addClass("current");
        } else if (e >= 24) {
            $(".step[data-desc ='Final Match']").addClass("current");
            $(".progress-text li:nth-child(4)").addClass("current");
        } else if (e >= 18) {
            $(".step[data-desc = 'Processing Your Requests']").addClass(
                "current"
            );
            $(".progress-text li:nth-child(3)").addClass("current");
        } else if (e >= 12) {
            $(".step[data-desc = 'Finding A Suitable Lender']").addClass(
                "current"
            );
            $(".progress-text li:nth-child(2)").addClass("current");
        } else {
            $(".step[data-desc = 'Verifying Your Profile']").addClass(
                "current"
            );
            $(".progress-text li:nth-child(1)").addClass("current");
        }
        var t = e,
            a = $(".modal .bar"),
            n = (t * a.width()) / 30;
        console.log(a.width(), n);
        if (e <= "30") {
            a.find(".progress").animate({ width: n }, 10);
            setTimeout(function() {
                submitprogress(t + 1);
            }, 1000);
        } else {
            $(".modal .continue").show();
        }
    } else {
        $("#myModal").modal("toggle");
    }
}
$(function() {
    var $sections = $(".form-section");
    
    function navigateTo(index, ev) {
        if (ev == "next") {
            let c = 0;
            while (c < 1) {
                if ($sections.eq(index).hasClass("hidden") === true) {
                    index++;
                } else {
                    c = 1;
                }
            }
            if ($sections.eq(index).hasClass("hidden") === false) {
                $(".form-section.current").addClass("done");
            }
            $sections.removeClass("current");
            $sections.eq(index).addClass("current");
        } else {
            let c = 1;
            while (c > 0) {
                if ($sections.eq(index).hasClass("hidden") === true) {
                    index--;
                } else {
                    c = 0;
                }
            }
            if ($sections.eq(index).hasClass("hidden") === false) {
                $("fieldset.current").addClass("done");
            }
            $sections.removeClass("current");
            $sections.eq(index).addClass("current");
        }
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }

    function curIndex() {
        // Return the current index by looking at which section has the class 'current'
        return $sections.index($sections.filter(".current"));
    }

    // Previous button is easy, just go back
    $(".form-navigation .previous").click(function() {
        navigateTo(curIndex() - 1, "back");
    });

    // Next button goes forward iff current block validates
    $(".form-navigation .next").click(function() {
        console.log(curIndex());
        $(".demo-form")
            .parsley()
            .whenValidate({
                group: "block-" + curIndex(),
            })
            .done(function() {
                navigateTo(curIndex() + 1, "next");
            });
    });

    // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
    $sections.each(function(index, section) {
        $(section)
            .find(":input")
            .attr("data-parsley-group", "block-" + index);
    });
    navigateTo(0); // Start at the beginning
});
$(document).ready(function() {
    const words = [
        "",
        "One",
        "Two",
        "Three",
        "Four",
        "Five",
        "Six",
        "Seven",
        "Eight",
        "Nine",
        "Ten",
        "Eleven",
        "Twelve",
        "Thirteen",
        "Fourteen",
        "Fifteen",
        "Sixteen",
        "Seventeen",
        "Eighteen",
        "Nineteen",
    ];
    const tens = [
        "",
        "",
        "Twenty",
        "Thirty",
        "Forty",
        "Fifty",
        "Sixty",
        "Seventy",
        "Eighty",
        "Ninety",
    ];

    const numberToWords = function(number) {
        if (number === 0) return "Zero";

        if (number < 20) return words[number];

        if (number < 100) {
            const digit = Math.floor(number / 10);
            const remainder = number % 10;
            return tens[digit] + (remainder ? " " + words[remainder] : "");
        }

        if (number < 1000) {
            const digit = Math.floor(number / 100);
            const remainder = number % 100;
            return (
                words[digit] +
                " Hundred" +
                (remainder ? " and " + numberToWords(remainder) : "")
            );
        }

        if (number < 100000) {
            const digit = Math.floor(number / 1000);
            const remainder = number % 1000;
            return (
                numberToWords(digit) +
                " Thousand" +
                (remainder ? ", " + numberToWords(remainder) : "")
            );
        }

        if (number < 10000000) {
            const digit = Math.floor(number / 100000);
            const remainder = number % 100000;
            return (
                numberToWords(digit) +
                " Lakh" +
                (remainder ? ", " + numberToWords(remainder) : "")
            );
        }

        const digit = Math.floor(number / 10000000);
        const remainder = number % 10000000;
        return (
            numberToWords(digit) +
            " Crore" +
            (remainder ? ", " + numberToWords(remainder) : "")
        );
    };

    const $monthlyIncomeInput = $("#monthly-income");
    const $incomeInWordsSpan = $("#income-in-words");
    const $annualIncomeInput = $("#annual_income");
    const $anualIncomeInWordsSpan = $("#income-in-words-annual");
    const $businessIncomeInput = $("#business_turnover");
    const $businessIncomeInWordsSpan = $("#income-in-words-business");
    const $businessMontlyIncomeInput = $("#business_monthly_profit");
    const $businessMontlyIncomeInWordsSpan = $(
        "#income-in-words-business-monthly"
    );
    $monthlyIncomeInput.on("input", function() {
        const value = $(this).val().replace(/\D/g, "");
        const amountInWords = numberToWords(Number(value));
        if ($(this).val() != 0) {
            $incomeInWordsSpan.text(
                amountInWords ? `${amountInWords} only.` : ""
            );
        }

    });
    $monthlyIncomeInput.on("blur", function() {
        const value = $(this).val();
        if ($(this).val() == 0) {
            $incomeInWordsSpan.text("");
        }
    });

    $annualIncomeInput.on("input", function() {
        const value = $(this).val().replace(/\D/g, "");
        const amountInWords = numberToWords(Number(value));
        if ($(this).val() != 0) {
            $anualIncomeInWordsSpan.text(
                amountInWords ? `${amountInWords} only.` : ""
            );
        }

    });

    $annualIncomeInput.on("blur", function() {
        const value = $(this).val();
        if ($(this).val() == 0) {
            $anualIncomeInWordsSpan.text("");
        }
    });

    $businessIncomeInput.on("input", function() {
        const value = $(this).val().replace(/\D/g, "");
        const amountInWords = numberToWords(Number(value));
        if ($(this).val() != 0) {

            $businessIncomeInWordsSpan.text(
                amountInWords ? `${amountInWords} only.` : ""
            );
        }
    });

    $businessIncomeInput.on("blur", function() {
        const value = $(this).val();
        if ($(this).val() == 0) {
            $businessIncomeInWordsSpan.text("");
        }
    });

    $businessMontlyIncomeInput.on("input", function() {
        const value = $(this).val().replace(/\D/g, "");
        const amountInWords = numberToWords(Number(value));
        if ($(this).val() != 0) {
            $businessMontlyIncomeInWordsSpan.text(
                amountInWords ? `${amountInWords} only.` : ""
            );
        }
    });
    $businessMontlyIncomeInput.on("blur", function() {
        const value = $(this).val();
        if ($(this).val() == 0) {
            $businessMontlyIncomeInWordsSpan.text("");
        }
    });
});

$("#welcome-form").parsley();

jQuery(".employeement-type .next").on("click", function() {
    // Which option was selected?
    var val = jQuery("[name=employment-type]:checked").val();
    console.log("emp", val);
    webEngage("EMP_TYPE");
    switch (val) {
        case "Salaried":
            jQuery(".salaried-employee").removeClass("hidden");
            jQuery(".salaried-employee input").attr("required", "required");
            jQuery(".others").addClass("hidden");
            jQuery(".self-employed-business").addClass("hidden");
            jQuery(".self-employed-professional").addClass("hidden");

            jQuery(".others input").removeAttr("required");
            jQuery(".self-employed-business input").removeAttr("required");
            jQuery(".self-employed-professional input").removeAttr("required");
            break;
        case "Self Employed Professional":
            jQuery(".self-employed-professional").removeClass("hidden");
            jQuery(".self-employed-professional input").attr(
                "required",
                "required"
            );
            jQuery(".others").addClass("hidden");
            jQuery(".self-employed-business").addClass("hidden");
            jQuery(".salaried-employee").addClass("hidden");

            jQuery(".others input").removeAttr("required");
            jQuery(".self-employed-business input").removeAttr("required");
            jQuery(".salaried-employee input").removeAttr("required");
            break;
        case "Self Employed":
            jQuery(".self-employed-business").removeClass("hidden");
            jQuery(".self-employed-business input").attr(
                "required",
                "required"
            );
            jQuery(".others").addClass("hidden");
            jQuery(".self-employed-professional").addClass("hidden");
            jQuery(".salaried-employee").addClass("hidden");
            jQuery(".others input").removeAttr("required");
            jQuery(".self-employed-professional input").removeAttr("required");
            jQuery(".salaried-employee input").removeAttr("required");
            break;
        case "Others":
            jQuery(".others").removeClass("hidden");
            jQuery(".others input").attr("required", "required");
            jQuery(".self-employed-business").addClass("hidden");
            jQuery(".self-employed-professional").addClass("hidden");
            jQuery(".salaried-employee").addClass("hidden");
            jQuery(".self-employed-business input").removeAttr("required");
            jQuery(".self-employed-professional input").removeAttr("required");
            jQuery(".salaried-employee input").removeAttr("required");
            break;
        default:
            jQuery(".salaried-employee").addClass("hidden");
            jQuery(".self-employed-professional").addClass("hidden");
            jQuery(".self-employed-business").addClass("hidden");
            jQuery(".others").addClass("hidden");
            jQuery(".others input").removeAttr("required");
            jQuery(".self-employed-professional input").removeAttr("required");
            jQuery(".salaried-employee input").removeAttr("required");
            jQuery(".self-employed-business input").removeAttr("required");
    }
});
$(document).ready(function() {
    var loanDurationInput = $('#loanDurationValue');
    var loanDurationSlider = $('#loanDuration');

    // Handle slider change event
    loanDurationSlider.on('input', function() {
        var value = $(this).val();
        loanDurationInput.val(value);
    });

    // Handle input field change event
    loanDurationInput.on('input', function() {
        var value = $(this).val();
        loanDurationSlider.val(value);
    });
});

$(document).ready(function() {
    const $loanAmountInput = $("#loanAmount");
    const $loanAmountValue = $("#loanAmountValue");

    function updateLoanSlider() {
        const sliderValueloan = $loanAmountValue.val();
        const progress =
            (sliderValueloan / $loanAmountInput.attr("max")) * 1000000;

        $loanAmountInput
            .val(sliderValueloan)
            .css(
                "background",
                `linear-gradient(to right, #5ab56b ${progress}%, #5ab56ba1 ${progress}%)`
            );
    }

    $loanAmountValue.on("input", updateLoanSlider);

    $loanAmountInput.on("input", function() {
        $loanAmountValue.val($(this).val());
        updateLoanSlider();
    });

    const $sliderEl1 = $("#emi");
    const $sliderValue1 = $("#emiValue");

    function updateSlider() {
        const sliderValue = $sliderValue1.val();
        const progress = (sliderValue / $sliderEl1.attr("max")) * 500000;

        $sliderEl1
            .val(sliderValue)
            .css(
                "background",
                `linear-gradient(to right, #5ab56b ${progress}%, #5ab56ba1 ${progress}%)`
            );
    }

    $sliderValue1.on("input", updateSlider);

    $sliderEl1.on("input", function() {
        $sliderValue1.val($(this).val());
        updateSlider();
    });

    function formatMoney(amount) {
        return new Intl.NumberFormat("en-IN", { currency: "INR" }).format(
            amount
        );
    }
});
jQuery(window).on("beforeunload", function() {
    return "true";
});

$(".sendOtp").on("click", function() {
    if ($("#phone-number").val() != "") {
        webEngage("OTP_SEND");
    }
});
$(".otpVerification").on("click", function() {
    webEngage("OTP_VERIFIED");
});
$(".salariedNext").on("click", function() {
    webEngage("SALARY_EMP");
});
$(".businessNext").on("click", function() {
    webEngage("BUSINESS");
});
$(".professionalNext").on("click", function() {
    webEngage("PROFESSIONAL_EMP");
});
$(".otherNext").on("click", function() {
    webEngage("OTHER");
});
$(".personalNext").on("click", function() {
    webEngage("PERSONAL");
});
$(".addressNext").on("click", function() {
    webEngage("ADDRESS");
    eligibilityCheck();
});
$(".emiNext").on("click", function() {
    webEngage("EMI_Details");
});

function webEngage(event) {
    switch (event) {
        case "OTP_SEND":
            webengage.user.setAttribute(
                "we_phone",
                "+91" + $("#phone-number").val()
            );
            webengage.track("Marketing Consent", {
                Phone: $("#phone-number").val(),
                "Accept marketing": $("#chkterms").val(),
            });
            webengage.user.setAttribute('we_whatsapp_opt_in', true);
            break;
        case "OTP_VERIFIED":
            webengage.user.login($("#phone-number").val());
            webengage.user.setAttribute(
                "we_phone",
                "+91" + $("#phone-number").val()
            );
            webengage.track("OTP Verified", {
                Phone: $("#phone-number").val(),
                "Accept marketing": $("#chkterms").val(),
            });
            break;
        case "LOAN_DETAILS":
            webengage.user.setAttribute("Loan Amount", $("#loanAmount").val());
            webengage.user.setAttribute(
                "Loan Tenure",
                $("#loanDuration").val()
            );
            webengage.user.setAttribute("PAN CARD", $("#pan").val());
            webengage.user.setAttribute("we_email", $("#email_address").val());
            webengage.track("Loan Details Filled", {
                "Loan Amount": $("#loanAmount").val(),
                "Loan Tenure": $("#loanDuration").val(),
                "PAN CARD": $("#pan").val(),
                Email: $("#email_address").val(),
            });
            break;
        case "EMP_TYPE":
            webengage.user.setAttribute(
                "Your profession",
                $("input[name=employment-type]:checked").val()
            );
            webengage.track("EMP Type Filled", {
                "Your profession": $("input[name=employment-type]:checked").val(),
            });
            break;
        case "SALARY_EMP":
            webengage.user.setAttribute(
                "Company type",
                $("#company-type").val()
            );
            webengage.user.setAttribute("Industry", $("#company-type").val());
            webengage.user.setAttribute("Designation", $("#designation").val());
            webengage.user.setAttribute(
                "Company name",
                $("#company_name").val()
            );
            webengage.user.setAttribute("Company address", {
                "Company Pincode": $("input[name=salary_pincode]").val(),
                "Company City": $("input[name=salary_city]").val(),
                "Company State": $("input[name=salary_state]").val(),
                "Company Country": $("#salary_country").val(),
            });
            webengage.user.setAttribute(
                "Years in current company",
                $("#years-worked").val()
            );
            webengage.user.setAttribute(
                "Monthly income",
                $("input[name=monthly_salary]").val()
            );
            webengage.user.setAttribute(
                "Mode of salary",
                $("input[name=mode-of-salary]:checked").val()
            );
            webengage.user.setAttribute(
                "Name of bank account",
                $("input[name=salary_bank_name]").val()
            );
            webengage.track("Salaried Section Filled", {
                "Company type": $("#company-type").val(),
                Industry: $("#company-type").val(),
                Designation: $("#designation").val(),
                "Company name": $("#company_name").val(),
                "Company address": $("input[name=salary_pincode]").val(),
                "Years in current company": $("#years-worked").val(),
                "Monthly income": $("input[name=monthly_salary]").val(),
                "Mode of salary": $("input[name=mode-of-salary]:checked").val(),
                "Name of bank account": $("input[name=salary_bank_name]").val(),
            });
            break;
        case "BUSINESS":
            webengage.user.setAttribute(
                "Business Run By",
                $("#businessOwnedId").val()
            );
            webengage.user.setAttribute(
                "Years in current business",
                $("#business_years-worked").val()
            );
            webengage.user.setAttribute(
                "Business type",
                $("#business-type-select").val()
            );
            webengage.user.setAttribute(
                "Industry",
                $("#business-industery").val()
            );
            webengage.user.setAttribute(
                "Company name",
                $("#business_company_name").val()
            );
            webengage.user.setAttribute("Company address", {
                "Company Pincode": $("input[name=business_pincode]").val(),
                "Company City": $("input[name=business_city]").val(),
                "Company State": $("input[name=business_state]").val(),
                "Company Country": $("input[name=business_country]").val(),
            });
            webengage.user.setAttribute(
                "Designation",
                $("#business_designation").val()
            );
            webengage.user.setAttribute(
                "Gross annual sales/ turnover",
                $("#business_turnover").val()
            );
            webengage.user.setAttribute(
                "Monthly profit",
                $("#business_monthly_profit").val()
            );
            webengage.user.setAttribute(
                "Business Current Acc with Bank",
                $("input[name=business_current_bank_account]").val()
            );
            webengage.user.setAttribute(
                "Primary Savings Acc with Bank",
                $("input[name=business_saving_bank_account]").val()
            );
            webengage.track("Business Section Filled", {
                "Years in current business": $("#business_years-worked").val(),
                "Business type": $("#business-type-select").val(),
                "Industry": $("#business-industery").val(),
                "Company name": $("#business_company_name").val(),
                "Company address": $("input[name=business_pincode]").val(),
                "Designation": $("#business_designation").val(),
                "Gross annual sales turnover": $("#business_turnover").val(),
                "Monthly profit": $("#business_monthly_profit").val(),
                "Business Current Acc with Bank": $("input[name=business_current_bank_account]").val(),
                "Primary Savings Acc with Bank": $("input[name=business_saving_bank_account]").val(),
            });
            break;
        case "PROFESSIONAL_EMP":
            webengage.user.setAttribute(
                "Years in current company",
                $("input[name=self_business_years]").val()
            );
            webengage.user.setAttribute(
                "Profession type",
                $("input[name=profession_type]").val()
            );
            webengage.user.setAttribute(
                "Company name",
                $("input[name=self_company_name]").val()
            );

            webengage.user.setAttribute("Company address", {
                "Company Pincode": $("input[name=company_pincode]").val(),
                "Company City": $("input[name=company_city]").val(),
                "Company State": $("input[name=company_state]").val(),
                "Company Country": $("input[name=company_country]").val(),
            });
            webengage.user.setAttribute(
                "Gross annual income",
                $("input[name=self_annual_income]").val()
            );
            webengage.user.setAttribute(
                "Business Current Acc with Bank", $("input[name=self_employed_current_bank]").val()
            );
            webengage.user.setAttribute(
                "Primary Savings Acc with Bank", $("input[name=self_employed_saving_bank_account]").val()
            );
            webengage.track("Professional Section Filled", {
                "Years in current company": $(
                    "input[name=self_business_years]"
                ).val(),
                "Profession type": $("input[name=profession_type]").val(),
                "Company name": $("input[name=self_company_name]").val(),
                "Company address": $("input[name=company_pincode]").val(),
                "Business Current Acc with Bank": $("input[name=self_employed_current_bank]").val(),
                "Gross annual income": $("input[name=self_annual_income]").val(),
                "Primary Savings Acc with Bank": $("input[name=self_employed_saving_bank_account]").val(),
            });
            break;
        case "OTHER":
            webengage.user.setAttribute(
                "Profession",
                $("input[name=profession]:checked").val()
            );
            webengage.track("Other Section Filled", {
                Profession: $("input[name=profession]:checked").val(),
            });
            break;
        case "PERSONAL":
            var genderText = $(".gender-text p").text();
            webengage.user.setAttribute(
                "we_first_name",
                $("input[name=first-name]").val()
            );
            webengage.user.setAttribute(
                "we_last_name",
                $("input[name=last-name]").val()
            );
            webengage.user.setAttribute(
                "we_birth_date",
                moment($("input[name=dob]").val(), "DD/MM/YYYY").format(
                    "YYYY-MM-DD"
                )
            );
            webengage.user.setAttribute("we_gender", genderText.toLowerCase());
            webengage.user.setAttribute(
                "Marital Status",
                $("input[name=marital_status]:checked").val()
            );
            webengage.user.setAttribute(
                "Qualification",
                $("input[name=qualification]").val()
            );
            webengage.track("Personal Section Filled", {
                we_first_name: $("input[name=first-name]").val(),
                we_last_name: $("input[name=last-name]").val(),
                we_birth_date: moment(
                    $("input[name=dob]").val(),
                    "DD/MM/YYYY"
                ).format("YYYY-MM-DD"),
                we_gender: $("input[name=gender]").val(),
                "Marital Status": $("input[name=marital_status]:checked").val(),
                Qualification: $("input[name=qualification]").val(),
            });
            break;
        case "ADDRESS":
            webengage.user.setAttribute("Address", {
                Address1: $("input[name=home_address]").val(),
                Address2: $("input[name=home_landmark]").val(),
                Pincode: $("input[name=home_pincode]").val(),
                City: $("input[name=home_city]").val(),
                State: $("input[name=home_state]").val(),
                Country: $("input[name=home_country]").val(),
            });
            webengage.user.setAttribute(
                "Residence type",
                $("input[name=residence-type]").val()
            );
            webengage.user.setAttribute(
                "Years at address",
                $("input[name=years-living]").val()
            );
            webengage.track("Address Section Filled", {
                Address1: $("input[name=home_address]").val(),
                Address2: $("input[name=home_landmark]").val(),
                Pincode: $("input[name=home_pincode]").val(),
                City: $("input[name=home_city]").val(),
                State: $("input[name=home_state]").val(),
                Country: $("input[name=home_country]").val(),
                "Residence type": $("input[name=residence-type]").val(),
                "Years at address": $("input[name=years-living]").val(),
            });
            break;
        case "EMI_Details":
            webengage.user.setAttribute("Total EMI CPM", $("#emiValue").val());
            webengage.user.setAttribute("Credit card", $("#credit-card").val());
            webengage.track("EMI Section Filled", {
                "Total EMI CPM": $("#emiValue").val(),
                "Credit card": $("#credit-card").val(),
            });
            break;
        case "SUBMIT":
            webengage.user.setAttribute("Consent", $("#defaultCheck2").val());
            webengage.track("Submit Consent", {
                Consent: $("#defaultCheck2").val(),
            });
            webengage.track("Form Submit", {
                Consent: $("#defaultCheck2").val(),
            });
            break;

    }
}