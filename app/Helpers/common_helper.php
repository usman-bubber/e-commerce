<?php

use App\Libraries\CustomFileUpload;
use Config\Services;

use App\Models\UserRoleModel;
use App\Models\UserModel;
use App\Models\RoleModel;

// Used in Dashboard Layouts Template
if (!function_exists('get_user_detail')) {
  function get_user_detail($id)
  {
    $data = [];
    $db = \Config\Database::connect();
    $query = $db->table('users')
      ->select("*")
      ->where('id', $id)
      ->get();

    if ($query->getNumRows() > 0) {
      $data = $query->getRowArray();
      return $data;
    }
    return $data;
  }
}

// Used in Login Function
function getuserrecord($id)
{
  $userrole = new RoleModel();
  return $userrole->where('id', $id)->first();
}

// After Signup Send Verification Code To User Email
function account_verify_send_email($email, $data, $username)
{
  $recipientEmail = $email;
  $fullname = $username;
  $tableHtml = '
    <body style="background: #F9F9F9; font-family: "DM Sans";">
    <div style="background-color:#F9F9F9;">
  
      <style type="text/css">
        html,
        body,
        * {
          -webkit-text-size-adjust: none;
          text-size-adjust: none;
        }
  
        a {
          color: #1EB0F4;
          text-decoration: none;
        }
  
        a:hover {
          text-decoration: underline;
        }
       
      </style>
      <div
        style="background: #ffffff; max-width:640px;margin:0 auto;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden">
        <div style="margin:0px auto;max-width:640px;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center"
            border="0">
            <tbody>
              <tr style="background:#E2F6FC;">
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:30px 0px;">
                  <div
                    style="cursor:auto;color:#FA8443;font-size:36px;font-weight:600;line-height:36px;text-align:center;">
                    Welcome to Online Quran Academy!</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div style="margin:0px auto;max-width:640px;background:#ffffff;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;"
            align="center" border="0">
            <tbody>
              <tr>
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 70px;">
                  <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                    style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tbody>
                        <tr>
                          <td style="word-break:break-word;font-size:0px;padding:0px 0px 20px;" align="left">
                            <div
                              style="cursor:auto;color:#737F8D;font-size:16px;line-height:24px;text-align:left;">
                              <h2
                                style="font-weight: 500;font-size: 20px;color: #4F545C;letter-spacing: 0.27px;">
                                Hey ' . $fullname . ',</h2>
                                <p>Thank you for choosing us. To complete the verification process, please use the following code:</p>
                                <p><strong>Verification Code: <span style="color:#fa8443">' . $data . '</span></strong></p>
                                <p>Please enter this code in the required field to confirm your booking and proceed with the next steps.
                                If you did not request this code or have any questions,feel free to contact us.</p>
                                <p>Thank you for your prompt attention to this matter.</p>
                              </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div style="margin:0px auto;max-width:640px;background:transparent;">
        <table role="presentation" cellpadding="0" cellspacing="0"
          style="font-size:0px;width:100%;background:transparent;" align="center" border="0">
          <tbody>
            <tr>
              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px;">
                <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                  <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                    <tbody>
                      <tr>
                        <td style="word-break:break-word;font-size:0px;">
                          <div style="font-size:1px;line-height:12px;">&nbsp;</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    </body>';
  $email = \Config\Services::email();
  $email->setFrom('khanusman8685@gmail.com', 'Online Quran Academy');
  $email->setTo($recipientEmail);
  $email->setSubject('Account Verification Code');
  $email->setMessage('<html><body><h2>Email Verification Code:</h2>' . $tableHtml . '</body></html>');

  if ($email->send()) {
  } else {
    $data['error'] = $email->printDebugger(['headers']);
    print_r($data['error']);
  }
}

// If User will add to card without login then this function will send email successfully message:
function send_email($email, $password, $firstname, $lastname)
{
  $fullname = $firstname . ' ' . $lastname;
  $main_img = 'data:image/png;base64,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';
  $recipientEmail = $email;
  $tableHtml = '
    <body style="background: #F9F9F9; font-family: "DM Sans";">
    <div style="background-color:#F9F9F9;">

      <style type="text/css">
        html,
        body,
        * {
          -webkit-text-size-adjust: none;
          text-size-adjust: none;
        }
  
        a {
          color: #1EB0F4;
          text-decoration: none;
        }
  
        a:hover {
          text-decoration: underline;
        }
      </style>

      <div
        style="background: #ffffff; max-width:640px;margin:0 auto;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden">
        <div style="margin:0px auto;max-width:640px;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center"
            border="0">
            <tbody>

              <tr>
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 0px;">
                  <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                    style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tbody>
                        <tr>
                          <td style="word-break:break-word;font-size:0px;padding:0px;" align="center">
                            <table role="presentation" cellpadding="0" cellspacing="0"
                              style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                              <tbody>
                                <tr>
                                  <td style=""><img alt="" title="" height="38px" src=' . $main_img . '
                                      style="border:none;display:block;"></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>

              <tr style="background:#E2F6FC;">
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:30px 0px;">
                  <div
                    style="cursor:auto;color:#FA8443;font-size:36px;font-weight:600;line-height:36px;text-align:center;">
                    Welcome to Dubai Safari!</div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div style="margin:0px auto;max-width:640px;background:#ffffff;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;"
            align="center" border="0">
            <tbody>
              <tr>
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 70px;">
                  <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                    style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tbody>
                        <tr>
                          <td style="word-break:break-word;font-size:0px;padding:0px 0px 20px;" align="left">
                            <div
                              style="cursor:auto;color:#737F8D;font-size:16px;line-height:24px;text-align:left;">
                              <h2
                                style="font-weight: 500;font-size: 20px;color: #4F545C;letter-spacing: 0.27px;">
                                Hey ' . $fullname . ',</h2>
                              <p>Thanks for registering an account with Dubai Safari. Use given email and password to login to our website, check your personal profile, and explore our products.</p>
                              <p>Email: <span style="color:#fa8443">' . $recipientEmail . '</span>.</p>
                              <p>Password: <span style="color:#fa8443">' . $password . '</span>.</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div style="margin:0px auto;max-width:640px;background:transparent;">
        <table role="presentation" cellpadding="0" cellspacing="0"
          style="font-size:0px;width:100%;background:transparent;" align="center" border="0">
          <tbody>
            <tr>
              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px;">
                <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                  <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                    <tbody>
                      <tr>
                        <td style="word-break:break-word;font-size:0px;">
                          <div style="font-size:1px;line-height:12px;">&nbsp;</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </body>';

  $email = \Config\Services::email();

  $email->setFrom('hamzanoor79@gmail.com', 'Dubai Safari');
  //$email->setTo($email);
  $email->setTo($recipientEmail);
  //$email->setCC('another@another-example.com');
  //$email->setBCC('them@their-example.com');

  $email->setSubject('Signup Email');
  // $email->setMessage('Testing the email class.');

  // Construct table HTML

  $email->setMessage('<html><body><h2>Signup Email:</h2>' . $tableHtml . '</body></html>');

  // $email->send();

  if ($email->send()) {
    // echo 'Email sent successfully';
  } else {
    $data['error'] = $email->printDebugger(['headers']);
    print_r($data['error']);
  }
}

function resetpassword_send_email($email, $data, $username)
{
  $recipientEmail = $email;
  $fullname = $username;
  $tableHtml = '
    <body style="background: #F9F9F9; font-family: "DM Sans";">
    <div style="background-color:#F9F9F9;">
  
      <style type="text/css">
        html,
        body,
        * {
          -webkit-text-size-adjust: none;
          text-size-adjust: none;
        }
  
        a {
          color: #1EB0F4;
          text-decoration: none;
        }
  
        a:hover {
          text-decoration: underline;
        }
       
      </style>
      <div
        style="background: #ffffff; max-width:640px;margin:0 auto;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden">
        <div style="margin:0px auto;max-width:640px;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center"
            border="0">
            <tbody>
              <tr style="background:#E2F6FC;">
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:30px 0px;">
  
                  <div
                    style="cursor:auto;color:#FA8443;font-size:36px;font-weight:600;line-height:36px;text-align:center;">
                    Online Quran Academy!</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div style="margin:0px auto;max-width:640px;background:#ffffff;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;"
            align="center" border="0">
            <tbody>
              <tr>
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 70px;">
                  <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                    style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tbody>
                        <tr>
                          <td style="word-break:break-word;font-size:0px;padding:0px 0px 20px;" align="left">
                            <div
                              style="cursor:auto;color:#737F8D;font-size:16px;line-height:24px;text-align:left;">
  
  
                              <h2
                                style="font-weight: 500;font-size: 20px;color: #4F545C;letter-spacing: 0.27px;">
                                Hey ' . $fullname . ',</h2>
                                <p>Please click on below button for update password</p>
                            </div>
                          </td>
                        </tr>
                        <tr>
                        <td style="word-break:break-word;font-size:0px;padding:10px 25px;" align="center">
                          <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;"
                            align="center" border="0">
                            <tbody>
                              <tr>
                                <td style="border:none;color:white;cursor:auto;padding:15px 19px;" align="center"
                                  valign="middle"><a href=' . $data . '
                                    style="text-decoration:none;line-height:100%;padding: 16px 32px; background: #FA8443; border-radius: 1000px;color:white;font-size:15px;font-weight:normal;text-transform:none;margin:0px;"
                                    target="_blank">
                                    Update Password
                                  </a></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div style="margin:0px auto;max-width:640px;background:transparent;">
        <table role="presentation" cellpadding="0" cellspacing="0"
          style="font-size:0px;width:100%;background:transparent;" align="center" border="0">
          <tbody>
            <tr>
              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px;">
                <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                  <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                    <tbody>
                      <tr>
                        <td style="word-break:break-word;font-size:0px;">
                          <div style="font-size:1px;line-height:12px;">&nbsp;</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>';
  $email = \Config\Services::email();
  $email->setFrom('khanusman8685@gmail.com', 'Online Quran Academy');
  $email->setTo($recipientEmail);
  $email->setSubject('Reset Password Email');
  $email->setMessage('<html><body><h2>Email for Reset Password:</h2>' . $tableHtml . '</body></html>');
  if ($email->send()) {
    // echo 'Email sent successfully';
  } else {
    $data['error'] = $email->printDebugger(['headers']);
    print_r($data['error']);
  }
}

function account_deactivate_send_email($email, $name)
{
  $recipientEmail = $email;
  $fullname = $name;
  $main_img = 'data:image/png;base64,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';
  $tableHtml = '
    <body style="background: #F9F9F9; font-family: "DM Sans";">
    <div style="background-color:#F9F9F9;">

      <style type="text/css">
        html,
        body,
        * {
          -webkit-text-size-adjust: none;
          text-size-adjust: none;
        }
        a {
          color: #1EB0F4;
          text-decoration: none;
        }
        a:hover {
          text-decoration: underline;
        }
      </style>

      <div style="background: #ffffff; max-width:640px;margin:0 auto;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden">
        <div style="margin:0px auto;max-width:640px;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center"
            border="0">
            <tbody>
              <tr>
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 0px;">
                  <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                    style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tbody>
                        <tr>
                          <td style="word-break:break-word;font-size:0px;padding:0px;" align="center">
                            <table role="presentation" cellpadding="0" cellspacing="0"
                              style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                              <tbody>
                                <tr>
                                  <td style=""><img id="myimgdata" alt="" title="" height="38px" src=' . $main_img . '
                                      style="border:none;display:block;"></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
              <tr style="background:#E2F6FC;">
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:30px 0px;">
                  <div
                    style="cursor:auto;color:#FA8443;font-size:36px;font-weight:600;line-height:36px;text-align:center;">
                    Welcome to Dubai Safari!</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div style="margin:0px auto;max-width:640px;background:#ffffff;">
          <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;"
            align="center" border="0">

            <tbody>
              <tr>
                <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 70px;">
                  <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                    style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tbody>
                        <tr>
                          <td style="word-break:break-word;font-size:0px;padding:0px 0px 20px;" align="left">
                            <div
                              style="cursor:auto;color:#737F8D;font-size:16px;line-height:24px;text-align:left;">
                              <h2
                                style="font-weight: 500;font-size: 20px;color: #4F545C;letter-spacing: 0.27px;">
                                Hey ' . $fullname . ',</h2>
                                <p>Your account has been deactivated. If you have any questions, please contact support team. : <strong>' . $email . '</strong></p>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
            </tbody>

          </table>
        </div>
      </div>
      <div style="margin:0px auto;max-width:640px;background:transparent;">
        <table role="presentation" cellpadding="0" cellspacing="0"
          style="font-size:0px;width:100%;background:transparent;" align="center" border="0">
          <tbody>
            <tr>
              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px;">
                <div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix"
                  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                  <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                    <tbody>
                      <tr>
                        <td style="word-break:break-word;font-size:0px;">
                          <div style="font-size:1px;line-height:12px;">&nbsp;</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    </body>';

  $email = \Config\Services::email();
  $email->setFrom('hamzanoor79@gmail.com', 'Dubai Safari');
  $email->setTo($recipientEmail);
  $email->setSubject('Account Status');
  $email->setMessage('<html><body><h2>Email for Reset Password:</h2>' . $tableHtml . '</body></html>');
  if ($email->send()) {
  } else {
    $data['error'] = $email->printDebugger(['headers']);
    print_r($data['error']);
  }
}

function user_log($form, $action, $user_id)
{

  $log_message = [
    'form' => $form,
    'action' => $action,
    'userAgent' => [
      $_SERVER['HTTP_USER_AGENT']
    ],
    'ipaddress' => $_SERVER['REMOTE_ADDR']
  ];

  $insert_data = [
    'user_id' => $user_id,
    'log_timestamp' => date('Y-m-d H:i:s'),
    'log_message' => json_encode($log_message),
  ];
  // $userlog = new UserLogsModel();
  // $userlog->insert($insert_data);
}

if (!function_exists('uploadSingleImage')) {
  function uploadSingleImage($directory, $image)
  {
    $fileUpload = new CustomFileUpload();
    $response = $fileUpload->uploadImage($directory,  $image);
    $responses = explode('-orginal_name-', $response);
    if ($responses[0] != 'format_error') {
      $path = $responses[0];
      $imageName = str_replace(trim($directory), "", trim($path));
    } else {
      $imageName = '';
    }
    return $imageName;
  }
}

helper('url'); // For base_url() and other URL helpers

/**
 * Get all active products.
 * 
 * @param object $productModel ProductModel instance
 * @return array List of active products
 */
function get_all_products($productModel)
{
  // Fetch all active products
  return $productModel
    ->where('status', 'active')
    ->findAll();
}

/**
 * Get products grouped by category.
 * 
 * @param object $categoryModel CategoryModel instance
 * @param object $productModel ProductModel instance
 * @return array Products grouped by category
 */
function get_products_by_category($categoryModel, $productModel)
{
  // Initialize an empty array to hold products grouped by category
  $productsByCategory = [];

  // Fetch all categories
  $categories = $categoryModel->findAll();

  // Loop through each category
  foreach ($categories as $category) {
    // Get all active products for this category
    $products = $productModel
      ->where('category_id', $category['id'])
      ->where('status', 'active')
      ->findAll();

    // Only add the category to the list if there are products
    if (!empty($products)) {
      $productsByCategory[$category['title']] = $products;
    }
  }

  return $productsByCategory;
}

function single_category_products($categoryModel, $productModel, $categoryId = null)
{
    // Initialize an empty array to hold products grouped by category
    $productsByCategory = [];

    if ($categoryId) {
        // Fetch the specific category
        $category = $categoryModel->find($categoryId);

        if ($category) {
            // Get all active products for this category
            $products = $productModel
                ->where('category_id', $category['id'])
                ->where('status', 'active')
                ->findAll();

            // Only add the category to the list if there are products
            if (!empty($products)) {
                $productsByCategory[$category['title']] = $products;
            }
        }
    } else {
        // Fetch all categories
        $categories = $categoryModel->findAll();

        // Loop through each category
        foreach ($categories as $category) {
            // Get all active products for this category
            $products = $productModel
                ->where('category_id', $category['id'])
                ->where('status', 'active')
                ->findAll();

            // Only add the category to the list if there are products
            if (!empty($products)) {
                $productsByCategory[$category['title']] = $products;
            }
        }
    }

    return $productsByCategory;
}

if (!function_exists('word_limiter')) {
  function word_limiter(string $string, int $limit, string $endChar = '...'): string
  {
    $string = strip_tags($string); // Remove HTML tags
    $words = explode(' ', $string);
    if (count($words) > $limit) {
      return implode(' ', array_slice($words, 0, $limit)) . $endChar;
    }
    return $string;
  }
}
