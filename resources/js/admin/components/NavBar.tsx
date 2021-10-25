import React from 'react'
import { RootState } from '@/admin/redux/index'
import { connect } from 'react-redux'
import { CombinedState } from 'redux'
import { I18nextProviderProps, withTranslation } from 'react-i18next'
import { Navigation } from 'react-minimal-side-navigation'
import 'react-minimal-side-navigation/lib/ReactMinimalSideNavigation.css'

const mapStateToProps = (state: RootState): CombinedState<RootState> => state
type NavbarProps = ReturnType<typeof mapStateToProps> & I18nextProviderProps
class NavBar extends React.Component<NavbarProps> {
  public render(): JSX.Element {
    const i18n = this.props.i18n
    return (
      <Navigation
        activeItemId="/admin"
        items={[
          {
            title: i18n.t('admin.component.navbar.home'),
            itemId: '../pages/Home.tsx',
          },
        ]}
      />
    )
  }
}
export default withTranslation('admin')(connect(mapStateToProps)(NavBar))
