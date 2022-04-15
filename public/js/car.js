function addCar(productId,ApiAdditemsCar,ApiItemsCountCar) 
{
    var dataSend = JSON.stringify({
        "productId": productId,
    });

    var config = {
        method: 'post',
        url: ApiAdditemsCar,
        headers: { 'Content-Type': 'application/json'},
        data : dataSend
    };

    axios(config).then(function (response) {
        if( typeof response.data === 'object'){
            Swal.fire(
                'producto agregado!',
                'Puede revisar en el carrito!',
                'success'
            )

            updateCar(ApiItemsCountCar);
        }
    }).catch(function (error) {
      console.log(error);
    });

};

function updateCar(ApiItemsCountCar) {
    var config = {
        method: 'get',
        url: ApiItemsCountCar,
        headers: { 'Content-Type': 'application/json'}
    };

    axios(config).then(function (response) {
        console.log(response.data);
        document.getElementById('itemsCantCar').innerHTML = response.data;
    }).catch(function (error) {
      console.log(error);
    });

}