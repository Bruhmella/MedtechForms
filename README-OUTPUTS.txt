changelog 2-24-25
-setup program
-created login/registration
-setup database 

changelog 2-25-25
-login function established
-fixed a bug where email can be created without '@" sign
-registration function established
-'home/dashboard' file created, no content yet
-fixed a bug where logging in with correct credentials did not redirect to home/dashboard

changelog 2-26-25
-fixed a bug where i could get in the system without logging in
-fixed a bug where the name of user does not show up in welcome, shows as "guest" instead
-started working on 'PATDATA' (patient data) module

changelog 2-27-25
-optimized license number upon registration to only accept positive number inputs
-added a 'logout' button, now also functional
-used 1st point's optimization for 'AddPatData' module's...
     1. patient age
     2. account number
     3. official receipt number
-after successful patient data registration, user will be redirected back to the home page

changelog 2-28-25
-added a README-OUTPUTS.txt for documentation
-in adding patient data, optimized the 'sex' input so user will only choose between M or F
-Changed 'add patient data' button to 'manage patient data' to organize functions
-corrected an error where AC# and OR# are user inputs and not automatically generated
-added functionality for 'update patient data'
-fixed a bug where adding a patient data was bought back to login page
-established 'view/update patient data' page, no functions yet
-established 'archive/delete patient data' page, no functions yet

changelog 3-3-25
-changed the default format of the auto generating ID of the account & official receipt number from AC0228251 and OR0228251 to AC022825001 and OR022825001 respectively
-added a 'position' during registration, with 'medical technologist' and 'pathologist' as selectable options
-optimized password registration: needs 6 characters minimum
-removed 'add doctor' function from home page
-added functions for 'view/update patient data' page
-reworked 'manage patient data' page, only retaining the 'add patient data' button. user can now view multiple patient data for easier data management
-implemented search bar that fetches patient name, account number, and official receipt number from 'patients' database

changelog 3-4-25
-simplified the operation of managing patient data; users can directly view, update, and archive a patient's data directly instead of being redirected to another page then only being able to do said functions
-added 'archived patients' page. users can use this page to permanently delete a patient's data only when archived.
-removed 'archive/delete patient data' button, since the aforementioned change made it obsolete

changelog 3-6-25
-added buttons in data table that allows users to sort names alphabetically, and their age by ascending/descending order
-added a search bar in during patient data management for filtering specific requested data
-added finishing touches to the functionality of the patient information management module (back buttons, clear search critera, etc.)
-finalized functionality of patient data management - ready for front-end development
-urinalysis form established, no functionality yet

changelog 3-14-25
-added 'sessions' for the following pages:
	-home
	-Manage Patient Data (PatDataManage)
	-Add Patient Data (AddPatData)
	-Patient Archives (Parchives)
	-Urinalysis
-created database for urinalysis
-started making the backbone functionality of urinalysis
-CURRENLT STUCK ON ERROR, WILL MAKE OTHER PAGES FIRST

changelog 3-17-25
-due to urinalysis error being fixed, will now continue developing at urinalysis
-'select patients' is now a dropdown which is fetched from adding patients' data
-OR# is now automatically generated & incrementing
-urinalysis only accepts user input from AC# in case there are two patients with same names
-valid user inputs on AC# or any patient selected will now automatically fill other parameters (age,sex, etc)
-'Requested by' parameter is static - user must specify name on the text input


