import { Datatable } from './datatable'

export class List {
    constructor() {
        this.initDatatable()
    }

    initDatatable() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content')
        const domainSlug = $('meta[name="domain"]').attr('content')
        const moduleName = $('meta[name="module"]').attr('content')
        const datatableUrl = $('meta[name="datatable-url"]').attr('content')
        const datatableColumns = $('meta[name="datatable-columns"]').attr('content')

        let datatable = new Datatable()
        datatable.url = `${datatableUrl}?datatable=1&_token=${csrfToken}`
        datatable.domainSlug = domainSlug
        datatable.moduleName = moduleName
        datatable.columns = JSON.parse(datatableColumns)
        datatable.rowUrl = `/${domainSlug}/${moduleName}/detail?id=%s`
        datatable.init('.dataTable')
    }
}