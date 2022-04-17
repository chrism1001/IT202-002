function flash(message = "", color = "info") {
    let flash = document.getElementById("flash");
    //create a div (or whatever wrapper we want)
    let outerDiv = document.createElement("div");
    outerDiv.className = "row justify-content-center";
    let innerDiv = document.createElement("div");

    //apply the CSS (these are bootstrap classes which we'll learn later)
    innerDiv.className = `alert alert-${color}`;
    //set the content
    innerDiv.innerText = message;

    outerDiv.appendChild(innerDiv);
    //add the element to the DOM (if we don't it merely exists in memory)
    flash.appendChild(outerDiv);
}

function add_to_cart(product_id, desired_quantity = 1) {
    postData({
        product_id: product_id,
        desired_quantity: desired_quantity
    }, "/Project/api/add_to_cart.php").then(data => {
        if (data.status === 200) {
            flash(data.message, "success");
            if (get_cart) {
                get_cart();
            }
        } else {
            flash(data.message, "danger");
        }
    }).catch(e => {
        flash("There was a problem adding the item to cart", "danger");
    });
}

async function postData(data = {}, url = "") {
    console.log(Object.keys(data).map(function (key) {
        return "" + key + "=" + data[key]; // line break for wrapping only
    }).join("&"));
    const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: Object.keys(data).map(function (key) {
            return "" + key + "=" + data[key];
        }).join("&")
    });
    return response.json();
}