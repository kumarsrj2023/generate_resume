<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume </title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- sweetalert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Bootstrap date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="style.css">


    <style>
        [v-cloak] {
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="userDetails pt-5 pb-3 bg-light" id="userDetails">
        <!-- <div v-show="!submit" class="container p-5"> -->
        <div class="container p-3">
            <div class="fomr_wrapper bg-white shadow rounded p-3">
                <form action="generate_pdf.php" class="userForm_details" method="POST">
                    <section class="row personal_details p-3">
                        <div class="col-sm-12 mb-4">
                            <div class="heading">
                                <h2 class="text-center">Please Fill Details Carefully</h2>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="sub_heading border-bottom">
                                <h4>Personal Details-</h4>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="fname" class="form-label">Name<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="text" name="fname" id="fname" class="s_input form-control form-control-lg" v-validate="'required|alpha_spaces'" data-vv-as="Full Name" data-vv-scope="userDetails" v-model="userForm_details.fullName" autocomplete="off" placeholder="Full Name">
                                    <span class="input_icon position-absolute"><i class="fa-solid fa-user"></i></span>
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.fname')" class="error form_error">{{ errors.first('userDetails.fname') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="fatherName" class="form-label">Father Name<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="text" name="fatherName" id="fatherName" class="s_input form-control form-control-lg" v-validate="'required|alpha_spaces'" data-vv-as="Father Name" data-vv-scope="userDetails" v-model="userForm_details.fatherName" autocomplete="off" placeholder="Father Name">
                                    <span class="input_icon position-absolute"><i class="fa-solid fa-user"></i></span>
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.fatherName')" class="error form_error">{{ errors.first('userDetails.fatherName') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="datepicker" class="form-label">Date Of Birth<span class="text-danger">*</span></label>
                                <div class="position-relative date_picker">
                                    <!-- <input type="date" name="dob" id="dob" class="s_input form-control form-control-lg" v-validate="'required'" data-vv-as="Date of Birth" data-vv-scope="userDetails" v-model="userForm_details.dob" autocomplete="off" placeholder="Date of birth"> -->
                                    <input type="text" name="dob" id="datepicker" class="s_input form-control form-control-lg calendar" data-date-format="dd-mm-yyyy" v-validate="'required'" data-vv-as="Date of Birth" data-vv-scope="userDetails" v-model="userForm_details.dob" autocomplete="off" placeholder="DD-MM-YYYY">
                                    <span class="input_icon position-absolute"><i class="fa-solid fa-calendar-days"></i></span>
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.dob')" class="error form_error">Date of Birth field is required</span>
                        </div>

                        <div class="col-12 col-sm-4 mb-4">
                            <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                            <div class="input_field ">
                                <div class="gender form-control-lg">
                                    <input type="radio" value="Male" name="gender" id="male" class="s_input form-check-input" v-validate="'required'" data-vv-as="Gender" data-vv-scope="userDetails" v-model="userForm_details.gender" autocomplete="off">
                                    <label for="male" class="form-check-label">Male</label>

                                    <input type="radio" value="Female" name="gender" id="female" class="s_input form-check-input ms-2" v-validate="'required'" data-vv-as="Gender" data-vv-scope="userDetails" v-model="userForm_details.gender" autocomplete="off">
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                                <span v-cloak v-if="errors.has('userDetails.gender')" class="error form_error">{{ errors.first('userDetails.gender') }}</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="email" class="form-label">Email id<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="email" name="email" id="email" class="s_input form-control form-control-lg" v-validate="'required|email'" data-vv-as="Email id" data-vv-scope="userDetails" v-model="userForm_details.email" autocomplete="off" placeholder="Email">
                                    <span class="input_icon position-absolute"><i class="fa-solid fa-envelope"></i></span>
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.email')" class="error form_error">{{ errors.first('userDetails.email') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="phone" class="form-label">Phone Number<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="tel" name="phone" id="phone" class="s_input form-control form-control-lg" v-validate="'required|digits:10'" data-vv-as="Phone Number" data-vv-scope="userDetails" v-model="userForm_details.phone" maxlength="10" autocomplete="off" placeholder="Phone Number">
                                    <span class="input_icon position-absolute"><i class="fa-solid fa-phone"></i></span>
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.phone')" class="error form_error">{{ errors.first('userDetails.phone') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="alternatePhone" class="form-label">Alternate Phone Number<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="text" name="alternatePhone" id="alternatePhone" class="s_input form-control form-control-lg" v-validate="'required|digits:10'" data-vv-as="Alternate Phone Number" data-vv-scope="userDetails" v-model="userForm_details.alternatePhone" maxlength="10" autocomplete="off" placeholder="Alternate Phone Number">
                                    <span class="input_icon position-absolute"><i class="fa-solid fa-phone"></i></span>
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.alternatePhone')" class="error form_error">{{ errors.first('userDetails.alternatePhone') }}</span>
                        </div>

                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="aadharnumber" class="form-label">Aadhar card Number<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="text" name="aadharnumber" id="aadharnumber" class="s_input form-control form-control-lg ps-3" v-validate="'required|digits:12'" data-vv-as="Aadhar Number" data-vv-scope="userDetails" v-model="userForm_details.aadharNumber" maxlength="12" autocomplete="off" placeholder="Aadhar card Number">
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.aadharnumber')" class="error form_error">{{ errors.first('userDetails.aadharnumber') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="pannumber" class="form-label">Pan card Number<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="text" name="pannumber" id="pannumber" class="s_input form-control form-control-lg ps-3" v-validate="'required|alpha_num'" data-vv-as="Pan Number" data-vv-scope="userDetails" v-model="userForm_details.panNumber" autocomplete="off" placeholder="Pan card Number">
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.pannumber')" class="error form_error">{{ errors.first('userDetails.pannumber') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="experience" class="form-label">Experience Year<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="text" name="experience" id="experience" class="s_input form-control form-control-lg ps-3" v-validate="'required|max:2|numeric'" data-vv-as="Experience" data-vv-scope="userDetails" v-model="userForm_details.experience" maxlength="2" autocomplete="off" placeholder="Enter Your Experience in year">
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.experience')" class="error form_error">{{ errors.first('userDetails.experience') }}</span>
                        </div>
                        <div class="col-12 col-sm-6 mb-4">
                            <div class="input_field">
                                <label for="skills" class="form-label">Skills<span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <textarea type="text" name="skills" id="skills" class="s_input form-control form-control-lg" v-validate="'required'" data-vv-as="Skills" data-vv-scope="userDetails" v-model="userForm_details.skills" autocomplete="off" placeholder="Skill1, Skill2, Skill3..."> </textarea>
                                </div>
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.skills')" class="error form_error">{{ errors.first('userDetails.skills') }}</span>
                        </div>
                    </section>

                    <section class="row address p-3">
                        <div class="col-12 mb-4">
                            <div class="sub_heading border-bottom">
                                <h4>Address Details-</h4>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="city" class="form-label">City<span class="text-danger">*</span></label>
                                <input type="text" name="city" id="city" class="s_input form-control form-control-lg" v-validate="'required'" data-vv-as="city Name" data-vv-scope="userDetails" v-model="userForm_details.city" autocomplete="off" placeholder="City">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.city')" class="error form_error">{{ errors.first('userDetails.city') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="district" class="form-label">District<span class="text-danger">*</span></label>
                                <input type="text" name="district" id="district" class="s_input form-control form-control-lg" v-validate="'required'" data-vv-as="District Name" data-vv-scope="userDetails" v-model="userForm_details.district" autocomplete="off" placeholder="District">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.district')" class="error form_error">{{ errors.first('userDetails.district') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                                <input type="text" name="state" id="state" class="s_input form-control form-control-lg" v-validate="'required'" data-vv-as="State Name" data-vv-scope="userDetails" v-model="userForm_details.state" autocomplete="off" placeholder="State">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.state')" class="error form_error">{{ errors.first('userDetails.state') }}</span>
                        </div>
                        <div class="col-12 col-sm-12 mb-4">
                            <div class="input_field">
                                <label for="addressOne" class="form-label">Address<span class="text-danger">*</span></label>
                                <input type="text" name="addressOne" id="address_one" class="s_input pannumber form-control form-control-lg" v-validate="'required'" data-vv-as="Address" data-vv-scope="userDetails" v-model="userForm_details.addressOne" autocomplete="off" placeholder="Address">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.addressOne')" class="error form_error">{{ errors.first('userDetails.addressOne') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="pinCode" class="form-label">Pin Code<span class="text-danger">*</span></label>
                                <input type="text" name="pinCode" id="pinCode" class="s_input form-control form-control-lg" v-validate="'required'" data-vv-as="Pin Code" data-vv-scope="userDetails" v-model="userForm_details.pinCode" autocomplete="off" placeholder="Pin code">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.pinCode')" class="error form_error">{{ errors.first('userDetails.pinCode') }}</span>
                        </div>
                    </section>

                    <section class="row qualifications p-3">
                        <div class="col-12 mb-4">
                            <div class="sub_heading border-bottom d-flex justify-content-start pb-2">
                                <h4>Qualification Details<span class="text-danger">*</span></h4>
                                <div class="input_field ms-2">
                                    <select @change="qualificationArray(count)" name="qualificationCount" class="s_input form-select w-auto" v-validate="'required'" data-vv-as="Qualification" data-vv-scope="userDetails" v-model="count" autocomplete="off">
                                        <option value="" selected>--Select--</option>
                                        <option value="1">High School</option>
                                        <option value="2">Intermediate</option>
                                        <option value="3">Graduate</option>
                                        <option value="4">Post Graduate</option>
                                    </select>
                                    <span v-cloak v-if="errors.has('userDetails.qualificationCount')" class="error form_error">Minimum 1 Qualification is required.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="qualification_table table-responsive">
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th>Degree</th>
                                            <th>College Name</th>
                                            <th>Passing Year</th>
                                            <th>Obtained marks</th>
                                            <th>Max marks</th>
                                            <th>Grade/Percentage</th>
                                            <th>Result</th>
                                            <th>Upload</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr v-for="(qualification, index) in qualification_details" :key="index">
                                            <td>
                                                <select :name="'degree_' + index" class="s_input form-select" v-validate="'required'" :data-vv-as="'Degree Name'" data-vv-scope="userDetails" v-model="qualification.degree" autocomplete="off">
                                                    <option value="" selected>--Select--</option>
                                                    <option v-if="count >= 1" value="highschool">High School</option>
                                                    <option v-if="count >= 2" value="Intermediate">Intermediate</option>
                                                    <option v-if="count >= 3" value="Graduate">Graduate</option>
                                                    <option v-if="count >= 4" value="Postgraduate">Postgraduate</option>
                                                </select>
                                                <!-- <span v-cloak v-if="errors.has('userDetails.degree_' + index)" class="error form_error">{{ errors.first('userDetails.degree_' + index) }}</span> -->
                                                <span v-cloak v-if="errors.has('userDetails.degree_' + index)" class="error form_error">Required!</span>
                                            </td>
                                            <td>
                                                <input type="text" :name="'collegeName_' + index" class="s_input form-control form-control" v-validate="'required'" :data-vv-as="'College Name'" data-vv-scope="userDetails" v-model="qualification.collegeName" autocomplete="off" placeholder="College / School Name">
                                                <span v-cloak v-if="errors.has('userDetails.collegeName_' + index)" class="error form_error">Required!</span>
                                            </td>
                                            <td>
                                                <select :name="'year_' + index" class="s_input form-select" v-validate="'required'" :data-vv-as="'Passing Year'" data-vv-scope="userDetails" v-model="qualification.passingYear" autocomplete="off">
                                                    <option value="" selected>--Select--</option>
                                                    <?php for ($i = 1975; $i <= date('Y'); $i++) { ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span v-cloak v-if="errors.has('userDetails.year_' + index)" class="error form_error">Required!</span>
                                            </td>
                                            <td>
                                                <input type="text" :name="'obtainedMarks_' + index" class="s_input form-control" v-validate="'required|numeric'" :data-vv-as="'Obtained Marks'" data-vv-scope="userDetails" v-model="qualification.obtainedMarks" autocomplete="off" placeholder="Obtained Marks">
                                                <span v-cloak v-if="errors.has('userDetails.obtainedMarks_' + index)" class="error form_error">Required!</span>
                                            </td>
                                            <td>
                                                <input type="text" :name="'maxMark_' + index" class="s_input form-control" v-validate="'required'" :data-vv-as="'Max Mark'" data-vv-scope="userDetails" v-model="qualification.maxMarks" autocomplete="off" placeholder="Maximum marks">
                                                <span v-cloak v-if="errors.has('userDetails.maxMark_' + index)" class="error form_error">Required!</span>
                                            </td>
                                            <td>
                                                <select :name="'gradeOrPercentage_' + index" class="s_input form-select" v-validate="'required'" :data-vv-as="'Grade / Percentage'" data-vv-scope="userDetails" v-model="qualification.gradeOrPercentage" autocomplete="off">
                                                    <option value="" selected>--Select--</option>
                                                    <option value="Grade">Grade</option>
                                                    <option value="Percentage">Percentage</option>
                                                </select>
                                                <span v-cloak v-if="errors.has('userDetails.gradeOrPercentage_' + index)" class="error form_error">Required!</span>
                                            </td>
                                            <td>
                                                <input type="text" :name="'result_' + index" class="s_input form-control" v-validate="'required'" :data-vv-as="'Result'" data-vv-scope="userDetails" v-model="qualification.result" autocomplete="off" placeholder="A/B/C... or 75,85,95...">
                                                <span v-cloak v-if="errors.has('userDetails.result_' + index)" class="error form_error">Required!</span>
                                            </td>
                                            <td class="" style="cursor: pointer;">
                                                <div class="wrapper" style="cursor: pointer;">
                                                    <label for="photoLoad" class="uploadLabel" style="cursor: pointer;">
                                                        <input type="file" :name="'document_' + index" class="s_input" :id="'photoLoad_' + index" v-validate="'required'" :data-vv-as="'Document image'" data-vv-scope="userDetails" @change="qualificationDocument($event, index)" autocomplete="off" />
                                                        <span :id="'fileValue_' + index"></span>
                                                    </label>
                                                    <div id="ImageGet" style="cursor: pointer;"></div>
                                                    <span v-cloak v-if="errors.has('userDetails.document_' + index)" class="error form_error">Required!</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                    <section class="row Documents p-3">
                        <div class="col-12 mb-4">
                            <div class="sub_heading border-bottom">
                                <h4>Documents-</h4>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="userimage" class="form-label">User Image<span class="text-danger">*</span></label>
                                <input type="file" name="userimage" id="userimage" class="form-control form-control-lg" v-validate="'required'" data-vv-as="Profile Photo" data-vv-scope="userDetails" @change="otherDocument($event, 0)" autocomplete="off" placeholder="User image">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.userimage')" class="error form_error">{{ errors.first('userDetails.userimage') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="aadharcard" class="form-label">Aadhar Card<span class="text-danger">*</span></label>
                                <input type="file" name="aadharcard" id="aadharcard" class="form-control form-control-lg" v-validate="'required'" data-vv-as="Aadhar Card" data-vv-scope="userDetails" @change="otherDocument($event, 1)" autocomplete="off" placeholder="Aadhar card">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.aadharcard')" class="error form_error">{{ errors.first('userDetails.aadharcard') }}</span>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <div class="input_field">
                                <label for="pancard" class="form-label">Pan Card<span class="text-danger">*</span></label>
                                <input type="file" name="pancard" id="pancard" class="form-control form-control-lg" v-validate="'required'" data-vv-as="Pan Card" data-vv-scope="userDetails" @change="otherDocument($event, 2)" autocomplete="off" placeholder="Pan card">
                            </div>
                            <span v-cloak v-if="errors.has('userDetails.pancard')" class="error form_error">{{ errors.first('userDetails.pancard') }}</span>
                        </div>
                    </section>

                    <section class="row form_buttons">
                        <div class="col-12 col-sm-4 text-center m-auto">
                            <button @click.prevent="submit_reg_form" class="btn btn-outline-success w-100 py-3 fs-5">Submit Details</button>
                            <!-- <button type="submit" class="btn btn-outline-success w-100 py-3 fs-5">Submit Details</button> -->
                        </div>
                    </section>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="text-center bg-info text-dark fs-bold py-3 m-0">Thank You</h4>
                                <div class="my-5"></div>
                                <div class="mb-3">
                                    <h5>Your data has been submited</h5>
                                </div>
                                <div class="m-auto text-center">
                                    <a class="btn btn-primary py-3 m-auto text-center" href="download_pdf.php">Download Pdf</a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal -->
            </div>
        </div>
        <style>
            label {
                margin-left: 20px;
            }

            #datepicker {
                width: 180px;
                margin: 0 20px 20px 20px;
            }

            #datepicker>span:hover {
                cursor: pointer;
            }
        </style>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vee-validate@<3.0.0/dist/vee-validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>





    <script>
        // Initialize VeeValidate
        Vue.use(VeeValidate, {
            // classes: true,
            // classNames: {
            //     valid: 'is-valid',
            //     invalid: 'is-invalid'
            // }
        });
        new Vue({
            el: '#userDetails',
            data: {
                userForm_details: {
                    countQualifications: 1,
                    fullName: '',
                    fatherName: '',
                    skills: '',
                    aadharNumber: '',
                    panNumber: '',
                    email: '',
                    phone: '',
                    alternatePhone: '',
                    dob: '',
                    addressOne: '',
                    city: '',
                    district: '',
                    state: '',
                    pinCode: '',
                    gender: '',
                    experience: ''
                },
                qualification_details: [{
                    degree: '',
                    collegeName: '',
                    passingYear: '',
                    maxMarks: '',
                    obtainedMarks: '',
                    result: '',
                    gradeOrPercentage: '',
                    document: '',
                }, ],
                count: '',
                qualificationDocuments: [],
                otherDocuments: [],
            },
            methods: {
                qualificationDocument(event, index) {
                    const files = event.target.files;
                    if (files.length > 0) {
                        this.$set(this.qualificationDocuments, index, files[0]); // update the file object in the array
                    }
                    this.qualification_details[index].document = files[0].name; // set file name in qualification_details
                },
                otherDocument(event, index) {
                    const files = event.target.files;
                    if (files.length > 0) {
                        this.$set(this.otherDocuments, index, files[0]); // update the file object in the array
                    }
                },
                submit_reg_form() {
                    let self = this;

                    this.$validator.validateAll('userDetails').then(valid => {
                        if (valid) {
                            // first check uploaded file is valid
                            const qualificationFiles = self.qualificationDocuments.filter(file => file !== undefined && file !== null);
                            const otherFiles = self.otherDocuments.filter(file => file !== undefined && file !== null);
                            // now create a object to append all data for ajax requests
                            let formData = new FormData();
                            // here is all qualifications file is appended to the form object
                            qualificationFiles.forEach((file, index) => {
                                formData.append(self.qualification_details[index].degree, file);
                            });
                            // here is all other files like adharcard,pancard,userimage are appended to the form object
                            otherFiles.forEach((file, index) => {
                                if (index == 0) {
                                    formData.append(`userimage`, file); //index 0,1,2 is fixed for userimage,adharcard,pancard because when otherDocument() method is run than user pass a aurgument which is index number
                                } else if (index == 1) {
                                    formData.append(`aadharcard`, file);
                                } else if (index == 2) {
                                    formData.append(`pancard`, file);
                                }
                            });

                            formData.append('userDetails', JSON.stringify(self.userForm_details));
                            formData.append('qualificationDetails', JSON.stringify(self.qualification_details));

                            $.ajax({
                                url: 'generate_pdf.php',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    response = JSON.parse(response);
                                    if (response['success']) {
                                        $(document).ready(function() {
                                            Swal.fire({
                                                title: 'Success!',
                                                text: 'Your file has been downloaded.',
                                                icon: 'success',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Download PDF',
                                                cancelButtonText: 'Cancel',
                                                allowOutsideClick: false
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = 'download_pdf.php';
                                                } else if (result.dismiss === Swal.DismissReason.cancel) {
                                                    window.location.href = 'index.php';
                                                }
                                            });

                                        });
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: "Something went wrong!",
                                            footer: '<a href="index.php">Go to Home page</a>',
                                            allowOutsideClick: false
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error uploading file:', error);
                                    // Handle error if needed
                                }
                            });

                        }
                    });
                },
                qualificationArray(count = 1) {
                    this.qualification_details = []; // Initialize the array
                    for (let index = 0; index < count; index++) {
                        let data = { // Create a new object in each iteration
                            degree: '',
                            collegeName: '',
                            passingYear: '',
                            maxMarks: '',
                            obtainedMarks: '',
                            result: '',
                            gradeOrPercentage: '',
                            document: ''
                        };
                        this.qualification_details.push(data); // Push the new object into the array
                    }
                    // console.log(this.qualification_details);
                },
            },

            computed: {

            },
            mounted() {
                $('#datepicker').datepicker({
                    clearBtn: true,
                    autoclose: true
                }).on('changeDate', (e) => {
                    // Update Vue.js data with selected date
                    this.userForm_details.dob = e.format();
                });


            }

        });
    </script>
</body>

</html>