$(function () {
    var table = $('#product-table').DataTable({
        ajax: 'zero_admin.php',
        initComplete: function (settings, json) {
            console.log("initComplete: " + json.data.length);

            $.each(json.data, function (key, value) {
                $("#emna").append('<option value="' + value.id + '">' +
                    value.name + '</option>')

            });
            deleteButtons();
        },

        columns: [
            { 'data': 'id' },
            { 'data': 'name' },
            { 'data': 'price' },
            { 'data': 'image' }
        ]
    });


    //change salary
    // $('#salary-save').click(function () {

    //     var employeeId = $('#emna').val();
    //     var employeeSalarySave = $('#salary_save').val();

    //     console.log("Id: " + employeeId);
    //     console.log("Salary: " + employeeSalarySave);

    //     salaryData = {
    //         employee_id: employeeId,
    //         employee_salary_save: employeeSalarySave
    //     };

    //     console.dir(salaryData);

    //     $.ajax({
    //         type: 'POST',
    //         url: 'http://nguyendung.atwebpages.com/set-employees.php',
    //         dataType: 'json',
    //         data: salaryData,
    //         success: function (data) {
    //             console.log('Success');
    //             console.log(data.status);
    //             console.log(data);

    //             //refresh the data in the table
    //             table.ajax.reload();
    //         },
    //         error: function (data, status, xhr) {
    //             console.log('Error');
    //             console.log(data.status);
    //             console.log(data);
    //             console.log(status);
    //             console.log(xhr);
    //         }
    //     });

    // });

    //add employee
    $('#product-save').click(function () {

        var productName = $('#name').val();
        var productPrice = $('#price').val();
        var productImage = $('#image').val();

        console.log("Name: " + productName);
        console.log("Price: " + productPrice);
        console.log("Image: " + productImage);

        productData = {
            product_name: productName,
            product_price: productPrice,
            product_image: productImage
        };

        console.dir(productData);

        $.ajax({
            type: 'POST',
            url: 'http://nguyendung2.atwebpages.com/zero_web1/add-product.php',
            dataType: 'json',
            data: productData,
            success: function (data) {
                console.log('Success');
                console.log(data.status);
                console.log(data);

                //refresh the data in the table
                table.ajax.reload();
            },
            error: function (data, status, xhr) {
                console.log('Error');
                console.log(data.status);
                console.log(data);
                console.log(status);
                console.log(xhr);
            }
        });

    });
    function deleteButtons() {
        $('.btn-danger').click(function () {

            delProductData = {
                product_id: $(this).val()
    
            };
    
            console.dir(delProductData);
    
            $.ajax({
                type: 'POST',
                url: 'http://nguyendung2.atwebpages.com/zero_web1/delete-product.php',
                dataType: 'json',
                data: delProductData,
                success: function (data) {
                    console.log('Success');
                    console.log(data.status);
                    console.log(data);
    
                    //refresh the data in the table
                    table.ajax.reload();
                },
                error: function (data, status, xhr) {
                    console.log('Error');
                    console.log(data.status);
                    console.log(data);
                    console.log(status);
                    console.log(xhr);
                }
            });
    
            console.log("Product ID:" + $(this).val());
        });
    }


})







