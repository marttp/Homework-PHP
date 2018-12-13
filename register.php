<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />

    <title>Register Form</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10 space-form">

          <form method="POST" class="form-body" action="./test.php">

            <div class="form-header">
              <div class="title">
                <label for="headerTitle">Register Form</label>
              </div>
            </div>

            <hr />

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">Firstname</label>
                <input
                  class="form-control"
                  type="text"
                  id="firstName"
                  name="firstName"
                  placeholder="Firstname"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Lastname</label>
                <input
                  class="form-control"
                  type="text"
                  id="lastName"
                  name="lastName"
                  placeholder="Lastname"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="male"
                    value="male"
                    checked
                  />
                  <label class="form-check-label" for="male"> Male </label>
                </div>

                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="female"
                    value="female"
                  />
                  <label class="form-check-label" for="female"> Female </label>
                </div>
              </div>
              <div class="col-1"></div>
            </div>

            <hr />

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="inputEmail"
                  name="inputEmail"
                  placeholder="Email"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="inputPassword"
                  name="inputPassword"
                  placeholder="Password"
                />
              </div>
            </div>

            <hr />

            <div class="form-group">
              <label for="inputAddress">Address</label>
              <textarea class="form-control" id="address" rows="2" name="address"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="inputCity"/>
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control" name="inputState">
                  <option selected>Choose...</option>
                  <option>Thailand</option>
                  <option>Germany</option>
                  <option>French</option>
                  <option>Italy</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="inputZip"/>
              </div>
            </div>
            <hr />
            <div class="row-button">
              <button type="submit">Register</button>
              <button type="reset">Reset</button>
            </div>
          </form>
        </div>

        <div class="col-2"></div>
      </div>
    </div>
    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/jquery-3.3.1.min.js"></script>
  </body>
</html>
