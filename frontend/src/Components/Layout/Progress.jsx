import React, { Component } from "react";

import NProgress from "nprogress";
import "nprogress/nprogress.css";

class Progress extends Component {
  componentDidMount() {
    NProgress.configure({
      speed: 200,
      showSpinner: false,
    }).start();
  }

  componentWillUnmount() {
    NProgress.done();
  }

  render() {
    return <h3 className="text-center">טוען אנא המתן...</h3>;
  }
}

export default Progress;
