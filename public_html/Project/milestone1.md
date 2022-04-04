<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Christopher Mejia(cm43)</td></tr>
<tr><td> <em>Generated: </em> 4/3/2022 3:10:15 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/cm43" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407412-91a93353-507c-4e61-92e3-3ce03aa95d23.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows multiple errors. For example the email is incorrect because it<br>does not have.com. Also the username is too short, and it also shows<br>that the passwords entered when registering a user did not match.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407161-51c6dcd5-309e-4a56-8386-f2d001a00700.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows that the user has successfully registered an account.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407185-0df4e8f1-1fbb-42b2-bb3e-7a60aa3a9700.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the new registered user in the Users table database.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/18">https://github.com/chrism1001/IT202-002/pull/18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/46">https://github.com/chrism1001/IT202-002/pull/46</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Registration can be split up into two parts. First is client side validation.<br>A new user will have to pass the necessary requirements for email length,<br>username length and password length. I also used regex to make sure the<br>username and email were valid. Next if the user passes the form validation,<br>the form will submit and php will validate the input data and add<br>it to the database.<br><a href="https://cm43-prod.herokuapp.com/Project/register.php">https://cm43-prod.herokuapp.com/Project/register.php</a><br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407459-fc5bc67c-7a28-4a24-afcb-c81d9361967f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows that the email entered is not valid because it does<br>not have a .com at the end.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407481-b4280059-350c-4586-9a09-32e77b935087.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows an incorrect username. This error happens when the username length<br>is less than 3 or greater than 16. It can also happen if<br>there are invalid symbols in the username.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407320-a51d8b5a-8ee3-4e65-8389-bcaa061d996d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the a successful user login and is directed to a<br>landing page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/46">https://github.com/chrism1001/IT202-002/pull/46</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/44">https://github.com/chrism1001/IT202-002/pull/44</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The login validation first determines whether the input is an email or a<br>username. It does this by checking if the email/username field has an @<br>symbol. If it does it uses the valid email regex expression to validate<br>the email. If it doesnt have an @ symbol that the user is<br>logging in with their username and it uses the valid username regex expression<br>to validate the username. If validation passes it is sent to php to<br>determine whether the user exists or does not exist.<br><a href="https://cm43-prod.herokuapp.com/Project/login.php">https://cm43-prod.herokuapp.com/Project/login.php</a><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407578-72b99749-c222-4443-8f77-a1cce022fbc8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the user successfully logging out.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407583-bd3bd27b-0a3e-4cbc-851c-9f18a1d07704.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows what happens when a logged out user tries to go<br>back one page or to their profile page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/34">https://github.com/chrism1001/IT202-002/pull/34</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>When the user logs out, the reset_session() php function is used to destroy<br>the session and return the user to the login page.<br><a href="https://cm43-prod.herokuapp.com/Project/logout.php">https://cm43-prod.herokuapp.com/Project/logout.php</a><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407706-0d75bd19-09e2-4f57-ba57-f368363b08d7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a logged out user trying to access an admin page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407732-d161b8af-8059-485c-bb05-53d4d20c46b2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a logged in user trying to anter an admin page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407751-8d080343-343e-44be-8e78-8186bcda73cc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the roles table with an admin role and a dummy<br>role that was created by the admin.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407756-844bfbbd-0a0c-44f9-9ad7-62af0e6330df.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the userroles table with a user with the admin role<br>and a dummy role.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/43">https://github.com/chrism1001/IT202-002/pull/43</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Login protected pages will use the is_logged_in() function to determine if a user<br>is logged in. If a user is not logged in, the user is<br>redirected to another page. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Basically php will check the current user role with the has_role() function and<br>determine whether the user entering the role protected area has the role. For<br>example if a user does not have the role admin assigned and tried<br>to access the admin page to create roles it will throw an error<br>and direct them back to the home page.<br><a href="https://cm43-prod.herokuapp.com/Project/admin/create_role.php">https://cm43-prod.herokuapp.com/Project/admin/create_role.php</a><br><a href="https://cm43-prod.herokuapp.com/Project/admin/list_roles.php">https://cm43-prod.herokuapp.com/Project/admin/list_roles.php</a><br><a href="https://cm43-prod.herokuapp.com/Project/admin/assign_roles.php">https://cm43-prod.herokuapp.com/Project/admin/assign_roles.php</a><br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161442378-bc96636e-05c5-4537-80ab-f8c31a2f5534.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the basic css style used in the form.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/59">https://github.com/chrism1001/IT202-002/pull/59</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>For my css, I added a container to navbar to make it easier<br>to work with the navbar. For the navbar I centered the links using<br>text-align, I added a background color, font color. The font color also changes<br>when the mouse hovers over one of the links. For the form, I<br>added padding, margins and borders. I changed the display so that the name<br>of the input field appeared ontop of the actual input field. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161407983-cb0ea436-a0e0-4846-8f90-95f882783502.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows that password and confirm do not match.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161409939-deeef130-c0c1-43fa-b63d-85fa9c8a04d0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the what happens when the password and confirm inputs dont<br>match. and when we try to submit the form when the password and<br>confirm fields are empty.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/23">https://github.com/chrism1001/IT202-002/pull/23</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>To display flash messages we use the flash function in the client side<br>and the php flash function for server side. It validates the client side<br>first and checks for errors to be printed and then validates the server<br>side to check for errors and print error messages.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161408051-0c6e249a-d264-4b70-b95a-e8c19e1618be.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user seeing their profile and their profile information.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/34">https://github.com/chrism1001/IT202-002/pull/34</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>The profile page uses php to get the user email and username from<br>the database. and displays it on the screen.<br><a href="https://cm43-prod.herokuapp.com/Project/profile.php">https://cm43-prod.herokuapp.com/Project/profile.php</a><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161410002-2e6c6b9a-6bbd-4543-a351-f485cfa2aee4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user successfully changing their username<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161410018-a5f02145-aff7-4f5a-a505-dc5d0d820911.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshows a user successfully changing their password.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161410086-1bb51012-9811-46d4-92c1-1d286ae931af.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the user jeffbezos before they change their username and email.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161410120-e1282fde-cbab-4a61-82a1-e8a05fa5e1a2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshots the updated username and email for jeffbezos<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/chrism1001/IT202-002/pull/55">https://github.com/chrism1001/IT202-002/pull/55</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>The profile validation is split into two parts. First is the client side<br>validation. If the user wants to change their email or username the input<br>fields from the first are validated using regex. Then then the user clicks<br>on the update profile button, if it passes the validation it will pass<br>it to the server to validate it with php and make sure the<br>changes are available. For the password, the password, current fields are checked to<br>make sure they are the correct length and then checks to see that<br>new password and confirm password are the same. Then it is passed to<br>the server side validation and will update the password of the user in<br>the database.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161444084-cc9eab6b-8138-4f0e-ae19-5acd524e2498.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of proposal.md with the correct links and dates.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161442654-42595e1d-495a-4da9-a85d-75da42983567.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot for completed issues in the done column.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/58187990/161442684-ea692112-8f28-47a9-8eaa-9039492a65e3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot for completed issues in done column.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/cm43" target="_blank">Grading</a></td></tr></table>