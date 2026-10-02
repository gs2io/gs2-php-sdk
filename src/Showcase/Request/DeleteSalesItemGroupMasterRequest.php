<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteSalesItemGroupMaster: Delete Sales Item Group Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#deletesalesitemgroupmaster
 */
class DeleteSalesItemGroupMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Sales Item Group name */
    private $salesItemGroupName;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return DeleteSalesItemGroupMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteSalesItemGroupMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Sales Item Group name */
	public function getSalesItemGroupName(): ?string {
		return $this->salesItemGroupName;
	}
    /** @param string|null $salesItemGroupName Sales Item Group name */
	public function setSalesItemGroupName(?string $salesItemGroupName) {
		$this->salesItemGroupName = $salesItemGroupName;
	}
    /**
     * @param string|null $salesItemGroupName Sales Item Group name
     * @return DeleteSalesItemGroupMasterRequest
     */
	public function withSalesItemGroupName(?string $salesItemGroupName): DeleteSalesItemGroupMasterRequest {
		$this->salesItemGroupName = $salesItemGroupName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteSalesItemGroupMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteSalesItemGroupMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSalesItemGroupName(array_key_exists('salesItemGroupName', $data) && $data['salesItemGroupName'] !== null ? $data['salesItemGroupName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "salesItemGroupName" => $this->getSalesItemGroupName(),
        );
    }
}