import React from 'react'
import { RootState } from '@/admin/redux'
import { CombinedState } from 'redux'
import { GlobalState } from '@/store/redux/modules/global'
import { I18nextProviderProps, withTranslation } from 'react-i18next'
import { Link } from 'react-router-dom'
import { connect } from 'react-redux'

const mapStateToProps = (state: RootState): CombinedState<GlobalState> => state.global

type FooterProps = ReturnType<typeof mapStateToProps> & I18nextProviderProps

class Footer extends React.Component<FooterProps> {
  public render(): JSX.Element {
    const { i18n } = this.props
    return (
      <footer className="adminFooter">
        <div className="container">
          <div className="left">
            {i18n.t('admin:components.footer.copyright', {
              replace: {
                year: new Date().getFullYear(),
              },
            })}
            <Link to="/">{this.props.appName}</Link>
          </div>
          <div className="center">
            Powered by <a href="https://github.com/pterobilling/pterobilling">Pterobilling</a>
          </div>
        </div>
      </footer>
    )
  }
}

export default withTranslation('admin')(connect(mapStateToProps)(Footer))
