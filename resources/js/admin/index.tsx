import '../common/bootstrap'

import React, { Suspense } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route } from 'react-router-dom'
import './i18n'
import Home from './pages/Home'

import App from './App'

import PageLoader from '@/common/component/PageLoader'

ReactDOM.render(
  <div id="admin-index">
    <Suspense fallback="Loading">
      <BrowserRouter>
        <Route component={App} />
        <Route exact path="/admin" component={Home} />
      </BrowserRouter>
    </Suspense>
    <PageLoader needToLoad={true} />
  </div>,
  document.getElementById('app')
)
