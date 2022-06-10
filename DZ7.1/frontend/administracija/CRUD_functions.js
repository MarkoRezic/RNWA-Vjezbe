var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js';
document.getElementsByTagName('head')[0].appendChild(script);

function setupCRUD(data_model, data_keys) {

    let usernameInput = $("input#username")
    let passwordInput = $("input#password")

    $.fn.generateInputs = () => {
        let modalHtml = ""
        for (const key of data_keys) {
            modalHtml +=
                `<div class="input-row">
                <label for="${key}">${key}</label>
                <input id="${key}_input" name="${key}" type="text" />
            </div>`
        }
        modalHtml +=
            `<div class="divider surface-8 mv5"></div>

        <div class="button-row">
            <button id="create-btn">CREATE</button>
            <button id="close-btn">CLOSE</button>
            <button id="update-btn">UPDATE</button>
            <button id="delete-btn">DELETE</button>
        </div>`
        $("#dataModal").html(modalHtml)
    }

    $.fn.updateTable = async = (data, callback) => {
        let htmlString =
            `<table class='data-table'>
            <tr>`
        for (const key of data_keys) {
            htmlString += `<th>${key}</th>`
        }
        htmlString +=
            `<th>Actions</th>
        </tr>`
        for (let i = 0; i < data.data.length; i++) {
            let dataObj = data.data[i]
            htmlString +=
                `<tr>`
            for (const key of Object.keys(dataObj)) {
                htmlString += `<td>${dataObj[key]}</td>`
            }
            htmlString +=
                `<td><button id=view-${dataObj[`${data_model}_id`]}>VIEW</button><button id=edit-${dataObj[`${data_model}_id`]}>EDIT</button></td>
            </tr>`
        }
        htmlString += `</table>`
        $("#resultDiv").html(htmlString);
    }

    $.fn.showModal = async (mode, callback) => {
        console.log("showing modal in mode:", mode)
        $("#dataModal").removeClass("display-none")
        $("#modalCover").removeClass("display-none")
        switch (mode) {
            case 'view':
                $("#dataModal").children(".input-row").children("input").attr("disabled", "disabled")
                $("#dataModal").addClass("view")
                break;
            case 'edit':
                break;
            case 'add':
                $("#dataModal").addClass("add")
                break;
        }
    }

    $.fn.closeModal = async (callback) => {
        $("#dataModal").children(".input-row").children("input").removeAttr("disabled")
        $("#dataModal").removeClass("view")
        $("#dataModal").removeClass("add")
        $("#dataModal").addClass("display-none")
        $("#modalCover").addClass("display-none")
    }

    $.fn.clearInputs = () => {
        for (const key of data_keys) {
            $(`#${key}_input`).val("")
        }
    }

    $.fn.inputFromData = (data) => {
        let dataObj = data.data
        for (const key of Object.keys(dataObj)) {
            $(`#${key}_input`).val(dataObj[key])
        }
    }

    $.fn.dataFromInput = () => {
        let dataObj = {}
        dataObj[data_model] = {}
        for (const key of data_keys) {
            dataObj[data_model][key] = $(`#${key}_input`).val()
        }
        return dataObj
    }

    $.fn.applyViewBtnClicks = async = (data, callback) => {
        console.log("applying view button clicks")
        for (let i = 0; i < data.data.length; i++) {
            let dataObjID = data.data[i][`${data_model}_id`]

            $(`#view-${dataObjID}`).click(function () {

                $.get(`http://localhost:3001/${data_model}/${dataObjID}`, function (data) {
                    $.fn.inputFromData(data)
                    $.fn.showModal('view')
                });


            })
        }
    }

    $.fn.applyEditBtnClicks = async = (data, callback) => {
        for (let i = 0; i < data.data.length; i++) {
            let dataObjID = data.data[i][`${data_model}_id`]

            $(`#edit-${dataObjID}`).click(function () {

                $.get(`http://localhost:3001/${data_model}/${dataObjID}`, function (data) {
                    $.fn.inputFromData(data)
                    $.fn.showModal('edit')
                    $("#update-btn").click(function () {
                        const credentials = btoa(usernameInput.val() + ":" + passwordInput.val())
                        $.ajax({
                            url: `http://localhost:3001/${data_model}/${dataObjID}`,
                            method: "PUT",
                            data: $.fn.dataFromInput(),
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader("Authorization", "Basic " + credentials);
                            },
                            success: function () {
                                $.fn.searchResults()
                                $.fn.closeModal()
                            }
                        });
                    })
                    $("#delete-btn").click(function () {
                        const credentials = btoa(usernameInput.val() + ":" + passwordInput.val())
                        $.ajax({
                            url: `http://localhost:3001/${data_model}/${dataObjID}`,
                            method: "DELETE",
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader("Authorization", "Basic " + credentials);
                            },
                            success: function () {
                                $.fn.searchResults()
                                $.fn.closeModal()
                            }
                        })
                    })
                });
            })
        }
    }

    $.fn.searchResults = async = (callback) => {

        var str = $(".search").val();

        $.get(`http://localhost:3001/search/${data_model}s?search=${str}`, function (data) {
            $.fn.updateTable(data)

            $.fn.applyViewBtnClicks(data)

            $.fn.applyEditBtnClicks(data)


            console.log(data)
        });
    }

    $(document).ready(function () {
        $.fn.generateInputs()
        $.fn.searchResults()

        $("#create-btn").click(function () {
            const credentials = btoa(usernameInput.val() + ":" + passwordInput.val())

            console.log(credentials)
            $.ajax({
                url: `http://localhost:3001/${data_model}`,
                method: "POST",
                data: $.fn.dataFromInput(),
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", "Basic " + credentials);
                },
                success: function () {
                    $.fn.searchResults()
                    $.fn.closeModal()
                }
            });
        })
        $("#add-btn").click(function () {
            $.fn.clearInputs()
            $.fn.showModal('add')
        })
        $("#modalCover").click(function () {
            $.fn.closeModal()
        })
        $("#close-btn").click(function () {
            $.fn.closeModal()
        })
        $(".search").keyup(function () {
            $.fn.searchResults()
        });
    });
}