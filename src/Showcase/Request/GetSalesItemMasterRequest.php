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
 * Request for getSalesItemMaster: Get Sales Item Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#getsalesitemmaster
 */
class GetSalesItemMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Sales Item name */
    private $salesItemName;
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
     * @return GetSalesItemMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetSalesItemMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Sales Item name */
	public function getSalesItemName(): ?string {
		return $this->salesItemName;
	}
    /** @param string|null $salesItemName Sales Item name */
	public function setSalesItemName(?string $salesItemName) {
		$this->salesItemName = $salesItemName;
	}
    /**
     * @param string|null $salesItemName Sales Item name
     * @return GetSalesItemMasterRequest
     */
	public function withSalesItemName(?string $salesItemName): GetSalesItemMasterRequest {
		$this->salesItemName = $salesItemName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSalesItemMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSalesItemMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSalesItemName(array_key_exists('salesItemName', $data) && $data['salesItemName'] !== null ? $data['salesItemName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "salesItemName" => $this->getSalesItemName(),
        );
    }
}