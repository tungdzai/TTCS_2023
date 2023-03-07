// preview product add/edit
const btnPreview = document.getElementById('previewProduct');
btnPreview.addEventListener('click', function () {
    const productName = document.getElementById('productName').value;
    const productStock = document.getElementById("productStock").value;
    const productSku = document.getElementById("productSku").value;
    const productCategoryID = document.getElementById("productCategoryID").value;
    const productExpired = document.getElementById("productExpired").value;

    document.getElementById('namePreview').value = productName;
    document.getElementById('stockPreview').value = productStock;
    document.getElementById('skuPreview').value = productSku;
    document.getElementById('category_id_preview').innerHTML = productCategoryID;
    document.getElementById('expired_at_preview').value = productExpired;

});
