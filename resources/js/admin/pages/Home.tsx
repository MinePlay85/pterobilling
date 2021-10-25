import React from 'react'
import { setCurrentRouteName } from '../redux/modules/global'
import { UserInfo } from '@/typings'
import API from '@/common/utils/API'
import Card from '@/common/component/Card'
import { I18nextProviderProps } from 'react-i18next'
import { CombinedState } from 'redux'
import { RootState } from '@/store/redux'

const mapStateToProps = (state: RootState): CombinedState<RootState> => state
const mapDispatchToProps = { API, setCurrentRouteName }

type HomeProps = ReturnType<typeof mapStateToProps> &
  I18nextProviderProps &
  typeof mapDispatchToProps
class Home extends React.Component<HomeProps> {
  public verifiyIsAdmin(): void {
    this.props.API.get<{ user: UserInfo }>('/user').then((response) => {
      if (!response.data.user.is_admin) {
        //transfer to an error page
      }
    })
  }

  public componentDidMount(): void {
    this.props.setCurrentRouteName(this.props.i18n.t('admin:routes.home'))
  }
  public render(): JSX.Element {
    const i18n = this.props.i18n
    return (
      <div className="container">
        <Card>
          <Card.Header>
            <Card.Title>{i18n.t('admin.component.home.cardtitle')}</Card.Title>
          </Card.Header>
          <Card.Body>
            <Card.Text>You are running on the PteroBilling rewrite</Card.Text>
          </Card.Body>
        </Card>
      </div>
    )
  }
}

export default Home
