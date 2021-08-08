import { GlobalState } from '@/store/redux/modules/global'
import React from 'react'
import { NavLink } from 'react-router-dom'
import { CombinedState } from 'redux'
import { RootState } from '@/store/redux'
import { connect } from 'react-redux'
import { withTranslation, I18nextProviderProps } from 'react-i18next'

const mapStateToProps = (state: RootState): CombinedState<GlobalState> => state.global
type NavbarProps = ReturnType<typeof mapStateToProps> & I18nextProviderProps

class Navbar extends React.Component<NavbarProps> {
  public render(): JSX.Element {
    const i18n = this.props.i18n
    console.log(i18n)
    i18n.t('')
    return (
      <nav className="navbar">
        <div className="container">
          <div className="navbar-brand">
            <NavLink to="/" className="navbar-item">
              <img src={this.props.appIcon} alt={`${this.props.appName}'s Logo`} />
              <span className="brand-text">{this.props.appName}</span>
            </NavLink>

            <button role="button" className="navbar-burger" data-target="nav-menu">
              <i className="fas fa-bars"></i>
            </button>
          </div>

          <div id="nav-menu" className="navbar-menu">
            <div className="navbar-start">
              <div className="navbar-item has-dropdown is-hoverable">
                <button className="navbar-link">{i18n.t('store:components.navbar.plans')}</button>

                <div className="navbar-dropdown">
                  <NavLink to="/plans" className="navbar-item">
                    {i18n.t('store:components.navbar.all_plans')}
                  </NavLink>
                  <hr className="navbar-divider" />
                  {this.props.plans.map((plan, index) => (
                    <NavLink to={`/plans/${plan.id}`} className="navbar-item" key={index}>
                      {plan.name}
                    </NavLink>
                  ))}
                </div>
              </div>

              <NavLink to="/contact" className="navbar-item">
                {i18n.t('store:components.navbar.contact')}
              </NavLink>
              <NavLink to="/support" className="navbar-item">
                {i18n.t('store:components.navbar.support')}
              </NavLink>
            </div>

            <div className="navbar-end">
              <div className="navbar-item has-dropdown is-hoverable">
                <button className="navbar-link">
                  {i18n.t('store:components.navbar.currency')}
                </button>
                <div className="has-dropdown"></div>
              </div>

              <div className="navbar-item has-dropdown is-hoverable">
                <button className="navbar-link">{i18n.t(`langs.${i18n.language}`)}</button>

                <div className="navbar-dropdown">
                  {this.props.i18n.languages.map((language, index) => (
                    <button className="navbar-item" key={index}>
                      {i18n.t(`langs.${language}`)}
                    </button>
                  ))}
                </div>
              </div>

              <div className="navbar-item has-dropdown is-hoverable">
                <button className="navbar-link">{i18n.t('store:components.navbar.account')}</button>
                <div className="navbar-dropdown">
                  <NavLink to="/login" className="navbar-item">
                    <i className="fas fa-signin"></i>
                    {i18n.t('store:components.navbar.login')}
                  </NavLink>
                  <NavLink to="/register" className="navbar-item">
                    {i18n.t('store:components.navbar.register')}
                  </NavLink>
                  <hr className="navbar-divider" />
                  <NavLink to="/forgot-password" className="navbar-item">
                    {i18n.t('store:components.navbar.forgot_password')}
                  </NavLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    )
  }
}

export default withTranslation('store')(connect(mapStateToProps)(Navbar))