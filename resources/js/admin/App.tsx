import React from 'react'
import { setGlobal } from './redux/modules/global'
import { UserInfo } from '@/typings'
import API from '@/common/utils/API'

import NavBar from './components/NavBar'
import Footer from './components/Footer'

const mapDispatchToProps = { API, setGlobal }

type AppProps = typeof mapDispatchToProps

class App extends React.Component<AppProps> {
  public verifiyIsAdmin(): void {
    this.props.API.get<{ user: UserInfo }>('/user').then((response) => {
      if (!response.data.user.is_admin) {
        //transfer to an error page
      }
    })
  }
  public render(): JSX.Element {
    return (
      <div className="admin-app">
        <NavBar />
        <Footer />
      </div>
    )
  }
}

export default App
