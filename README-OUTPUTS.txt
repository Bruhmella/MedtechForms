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

changelog 3-19-25
-added functionality for:
PHYSICAL CHARACTERISTIC
	-color
	-Transparency
	-pH
	-Specific Gravity
MICROSCOPIC FINDINGS
	-RBC
	-WBC
	-Squamous Epithelial Cells
	-mucus threads
	-Bacteria
-all inputs can now be uploaded in database
-RBC & WBC are restricted using integer inputs

changelog 3-24-25
added functionality for:
CHEMICAL TEST
	-Protein
	-glucose
	-ketones
	-bilirubin
	-pregnancy test
	-other/s
CRYSTALS
	-Amorphous Urates
	-Amorphous Phosphates
	-uric acid
	-calcium oxalate
	-triple phosphate
CASTS
	-hyaline
	-granular
	-WBC
	-RBC
system now detects whether user is a medical technologist or pathologist, and automatically fills up either 'medical technologist' or 'pathologist' parameter. the other parameter is a dropdown of names associated with their role, eg. if the user is a medical technologist, the 'medical technologist' will be automatically filled with their credentials (name, license number & role). *Then, in this case, the user can pick a name from the dropdown menu consisting of user/s with the 'pathologist' role, automatically filling up their user credentials as well.*
*optional - if name is not present in database, user may leave it blank.

changelog 3-25-25
-fixed an issue where some parameters are returned null in the database.
-started setting up from home->fecalysis [no page has been made yet]

changelog 3-26-25
-created fecalysis page from home
-added basic functions (session & back-to-home button)
-added migrations for database upload of data & fetching

changlog 3-28-25
-added further functions for fecalysis [90% progress on backend]

changelog 3-31-25
-fixed the following issues on FECALYSIS module
	-receipt number not incrementing
	-patient data not being uploaded to fecalyses database
	-wbc, rbc rounding off the values instead of taking the decimals as-is
	-MedTech name (not license number) not uploading on database upon selecting from dropdown (when pathologist is logged in)
	-pathologist name (not license number) not uploading on database upon selection from dropdown (when MedTech is logged in)
	-license numbers unintentionally being uploaded in database
-finalized fecalysis backend, frontend developer can now design this page as well

changelog 4-2-25
-HAPPY APRIL FOOLS (added a secret button where clicking can delete all entries in the database)
-established routes from home -> hematology, and hematology -> home
-established basic functionality for hematology
-established whole functionality for hematology (done during the last minute)
-finalized hematology backend, front end can now design this page as well

changelog 4-3-25
-fixed database corruption, made easy by providing backup file beforehand
-established route from home->chemistry, and chemistry -> home
-established whole functionality for chemistry page
-finalized chemistry backend funcionality, front end can now design this page

changelog 4-4-25
BACK END PROGRESS REPORT:
	Page last worked on: S.Typhi
	System Progress: 11/18 forms completed
	❌ System Testing
Form report: HbA1c
	✅ established routes (home -> form page, and vice versa)
	✅ Inputs are being uploaded to its appropriate database
	✅ Text Boxes are assigned only their appropriate Inputs
	✅ Green light for Front-end Developer
Form report: Thyroid
	✅ established routes (home -> form page, and vice versa)
	✅ Inputs are being uploaded to its appropriate database
	✅ Text Boxes are assigned only their appropriate Inputs
	✅ Green light for Front-end Developer
Form report: HBSAG
	✅ established routes (home -> form page, and vice versa)
	✅ Inputs are being uploaded to its appropriate database
	✅ Text Boxes are assigned only their appropriate Inputs
	✅ Green light for Front-end Developer
Form report: TROP I	 1 & 2
	✅ established routes (home -> form page, and vice versa)
	✅ Inputs are being uploaded to its appropriate database
	✅ Text Boxes are assigned only their appropriate Inputs
	✅ Green light for Front-end Developer
Form report: S. Typhi
	✅ established routes (home -> form page, and vice versa)
	✅ Inputs are being uploaded to its appropriate database
	✅ Text Boxes are assigned only their appropriate Inputs
	✅ Green light for Front-end Developer
Other changes:
	✅ Added a txt file for to-do list
	❌ Added documentation when anyone wants to test system as WIP state
	✅ fixed an issue where hba1c data was being uploaded to thyroid database (i have no idea how this happened)
Current roadmap:
	-18/18 forms completed by April 14
	-if first roadmap is met, will polish/add few Quality of Life functions


