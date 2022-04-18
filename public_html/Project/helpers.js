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
    clear_flashes();
}

let flash_timeout = null;
function clear_flashes () {
    let flash = document.getElementById("flash");
    if (!flash_timeout && flash) {
        flash_timeout = setTimeout(() => {
            console.log("removing");
            if (flash.children.length > 0) {
                flash.children[0].remove();
            }
            flash_timeout = null;
            if (flash.children.length > 0) {
                clear_flashes();
            }
        }, 3000);
    }
}
window.addEventListener("load", () => setTimeout(clear_flashes, 100));

function add_to_cart(product_id, desired_quantity = 1) {
    postData({
        product_id: product_id,
        desired_quantity: desired_quantity
    }, "/Project/api/add_to_cart.php").then(data => {
        if (data.status === 200) {
            flash(data.message, "success");
        } else {
            flash(data.message, "danger");
        }
    }).catch(e => {
        flash("There was a problem adding the item to cart", "danger");
    });
}

function deleteLineItem(line_id, ele) {
    console.log("delete ele", ele);
    postData({
        line_id: line_id
    }, "/Project/api/delete_cart.php").then(data => {
        console.log(data);
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