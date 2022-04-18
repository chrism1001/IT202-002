<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Christopher Mejia(cm43)</td></tr>
<tr><td> <em>Generated: </em> 4/18/2022 6:51:12 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-2-shop-project/grade/cm43" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163753052-e92c493c-a29e-4fa3-ba03-03418dfe29c5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of adming adding an item to the shop.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163753127-368a2bda-55a5-4e9b-a67b-01721e48b725.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of item appearing in Products table.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>To add products to the database, we use $_POST in php to add<br>items to the database. $_POST sends the new item with the values that<br>the admin inputs into the database. We also utilize the save_data function to<br>insert the data into the database.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/89">https://github.com/chrism1001/IT202-002/pull/89</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/admin/add_products.php">https://cm43-prod.herokuapp.com/Project/admin/add_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163753349-1aaacafb-b9c8-47f3-ab3c-526ca35d73fe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of shop page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163753481-ad336d4d-66b5-458f-9814-70b8325118a0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of items in shop sorted by name and descending order.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163753603-60c51d82-c208-4c96-8e35-0a5f139a0736.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Partial name matching.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code (ensure ucid and date is shown)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163753682-7f0fc01e-22a9-48a9-9996-38aaaac147ac.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for sorting and filtering.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>The query selects items from the products table that have a visibility of<br>one. Partial name is done by using two % signs to match items<br>with the same characters in the database. The sorting is done by using<br>the ORDER by keywords in sql and are sorted in ascending and descending<br>order.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/90">https://github.com/chrism1001/IT202-002/pull/90</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/shop.php">https://cm43-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163754215-3d3fbf1c-d703-49c8-a11d-57919b0d4b6b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>List of products that only the admin can see.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>The admin products list page is shown by all the columns from the<br>product page including the false visibility products. The products list page also uses<br>partial matches with the POST function so the admin can search for the<br>products that they need.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/89">https://github.com/chrism1001/IT202-002/pull/89</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/admin/list_products.php">https://cm43-prod.herokuapp.com/Project/admin/list_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a sceenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163754391-4407882f-d9ec-44ac-bb39-6c83e27bc2aa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Edit link for admin in shop page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a sceenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163859685-43594b78-ab32-4143-8cba-66d2eef7b83d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Edit link in product details page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a sceenshot showing the edit button visible to the Admin on the Admin Product List Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163754455-0463475e-827f-4979-a70f-0e5da8bf65c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Edit link visible for admin in admin product list page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163754887-c3c14c31-3784-4bf0-b5aa-6f8e2979ce54.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before editing an item.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163755060-acee0740-ce59-4a28-82bf-993f718ebc84.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After editing an item.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163754985-2f2a80bf-c8b8-4e99-bc42-5019335798cf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before of database.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163755111-1000f111-c6a4-4027-9a51-28aaedcd734b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After database.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>The edit page function uses the $_GET function to retrieve the information of<br>the item and displays the information of the product for the admin to<br>change in input fields. Then it uses the $_POST and the update_data function<br>to update the values in the database on submit.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/89">https://github.com/chrism1001/IT202-002/pull/89</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/admin/edit_product.php?id=1">https://cm43-prod.herokuapp.com/Project/admin/edit_product.php?id=1</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163756302-47a2fc1c-2db1-44da-bf95-5addc39dca8a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of product details link showing on product cards.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163859947-573b8981-aee2-44cb-ac73-e87029de0349.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of sample product details page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>For the product details page. I used a query to select all the<br>items with the product id that I selected. This was done with the<br>$_GET command to get the id of the product. Then I get the<br>results and dynamically generate the table with the items, ignoring the fields that<br>I dont need, like visibility, created, and modified.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/92">https://github.com/chrism1001/IT202-002/pull/92</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/product_details.php?id=1">https://cm43-prod.herokuapp.com/Project/product_details.php?id=1</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163861991-365b6612-a97f-4c17-9b6e-1f45a0d3f580.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of adding to cart. There is an issue that I need to<br>resolve where it flashes to wrong message to the user. The item is<br>still added to the cart, but the success message is not flashed.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163862066-07214c1a-3369-4ffb-bb68-fa2f9ee43c5b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>From the network tab I can see the 200 message, but obviously the<br>incorrect message is being displayed.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163861654-e224002e-2063-40b6-872e-14b21068abf2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of what happens when you add to cart and your not logged<br>in. There is an issue that I need to resolve where it flashes<br>to wrong message to the user. The item is still added to the<br>cart, but the success message is not flashed.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163861806-8fdbe934-b261-451e-b738-a5ea16879f61.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>From the network tab I can see the 403 message, but obviously the<br>incorrect message is being displayed.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163862211-d12337c0-a1dd-4ea5-843c-4cba627e2cb9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of items being added to cart.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>I implemented a php cart and only 1 cart per user. My cart<br>prepares a query to select all the items of the users cart from<br>the cart table with the user id. It joins the product table and<br>cart table to select the information it needs to display on the cart.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>Whenever a user clicks the add to cart button a javascript ajax function<br>is called. This ajax function uses my add_to_cart.php file to insert items into<br>the cart table. It insert the product_id the user adds, the quantity, and<br>the id of the user. Currently the user can only add one item<br>from the shop page at a time.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/91">https://github.com/chrism1001/IT202-002/pull/91</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View (show subtotal, total, and the link to Product Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163755432-3ac7c8e8-3da8-412e-af42-c34f2439694e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of admins cart.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>The cart is able to display the values it needs from a query<br>that joins the Products and CART table. After the values are retrieved from<br>the database, I calculate the subtotal in the query by multiplying the quantity<br>by the unit_price. I also create a $total variable that holds the sum<br>of all the subtotals. I use a loop to loop through the subtotals<br>from the query and add it to the total.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/91">https://github.com/chrism1001/IT202-002/pull/91</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cm43-prod.herokuapp.com/Project/cart.php">https://cm43-prod.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/f2c037/000000?text=Partial"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>I wasn unsure how to implement this. I originially thought to create a<br>from and update the value when i clicked the update item page, but<br>it wasn&#39;t working. I thought I could use the add_to_cart js function and<br>api to update it, but I couldn&#39;t get it to work.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/91">https://github.com/chrism1001/IT202-002/pull/91</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163874631-9aec0d86-f83b-4f82-bacd-a8c79acd26d3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before deleting single item.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163874775-c4ada067-7474-4440-828c-96c5440d69c9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database before deleting single item.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163874896-1e9b7fad-badb-4569-824c-977feee9823d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After deleting single item. As you can see the request goes through, but<br>the page is not dynamically updated. Only until you reload the page will<br>the cart update. Still need to work on this.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163875097-2abb3d06-ea84-45c0-a75c-7361b964b47c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database after deleting single item.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163875240-7625a830-f83a-4f44-b3ce-215278ef67ac.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before clearing cart.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163875399-15d97779-cd63-48a8-a321-5b8e5788ef26.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database before clearing cart.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163875655-fc620ea0-6db2-4ea8-b592-34d72eee495e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After clearing cart. As you can see the request goes through, but the<br>page is not dynamically updated. Only until you reload the page will the<br>cart update. Still need to work on this.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163875783-61065ef1-8984-414a-8f34-545d32000139.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database after clearing cart.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>To delete a single item from the cart I create an api (delete_cart.php)<br>and a javascript ajax function that takes in the products line number as<br>a parameter. From this line number I setup a query to deletes the<br>product id associated to that user from the cart table.<br>To delete the entire<br>cart I created an api (clear_cart) and a javascript ajax function that takes<br>in the user id as a parameter. From this userid i setup a<br>query that deletes all the items associated with that user id from the<br>cart table.<br>My delete functions are not complete. Although the items are deleted from<br>the table, I do not know how to update the page with ajax<br>request.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <em>Response:</em> <p><a href="https://github.com/chrism1001/IT202-002/pull/91">https://github.com/chrism1001/IT202-002/pull/91</a><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163889591-e3b67df1-bd14-4fda-b597-ed04fed34f61.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of proposal.md file.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163873512-0196aa7d-8d75-4a5d-a600-5a64d8a84d22.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of completed isses in project board.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/163873685-f937433b-4e48-4476-bf4a-efa84759fdb1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of completed isses in project board.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-2-shop-project/grade/cm43" target="_blank">Grading</a></td></tr></table>