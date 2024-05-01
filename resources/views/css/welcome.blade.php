<style>
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:700");

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Open Sans", sans-serif;
      --text-color-primary: #5B37B7;
      --primary-color:#5B37B7;
      --hover-color-text:#ffffff;
    }

    /* by default include the background of the option for the home navigation */
    body {
      color: #010101;
      /* center in the viewport */
      min-height: 100vh;
      font-family: "Open Sans", sans-serif;
      /* transition for the change in bg color */
      transition: background 0.2s ease-out;
      padding: 1rem;
    }

    .container {
      display: inline-block;
      margin: 1rem;
      height: 40vh;
      width: 47%;
      text-wrap: wrap;
      border-radius: 10px;
      padding: 10px 20px;
      border-left-color: var(--color);
      border-left-width: 10px;
      border-left-color: solid;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5),
        -2px -2px 4px rgba(255, 255, 255, 0.5);
    }
    .container .title {
      text-align: center;
      color: var(--text-color-primary);
      border-bottom: solid var(--text-color-primary) 1px;
    }
    .container .content {
      font-size: medium;
      text-wrap: wrap;
    }
    .nav {
    display: flex;
    justify-content: flex-end;
    padding: 10px;
  }

  .item {
    margin-right: 10px;
    text-decoration: none;
    color: var(--text-color-primary);
    padding: 5px;
    border-radius: 5px;
  }

  .item:hover {
    background-color: var(--primary-color);
    color: var(--hover-color-text);
  }
  /* Custom styles for the welcome heading */
  .welcome-heading {
            color: #5B37B7;
            /* Dark gray color */
            font-size: 2rem;
            /* 32px font size */
            font-weight: bold;
            /* Bold font weight */
            margin-bottom: 1rem;
            /* Bottom margin of 1rem */
        }

        /* Custom styles for the user count paragraph */
        .user-count {
            color: #666;
            /* Medium gray color */
            margin-bottom: 2rem;
            /* Bottom margin of 2rem */
        }

        /* Custom styles for the bold user count span */
        .user-count span {
            font-weight: bold;
            /* Bold font weight */
        }

        .container-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 50vh;
            /* Make the container full height of the viewport */
        }
  </style>
