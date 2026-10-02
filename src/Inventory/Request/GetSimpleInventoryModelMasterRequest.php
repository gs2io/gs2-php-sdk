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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getSimpleInventoryModelMaster: Get Simple Inventory Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#getsimpleinventorymodelmaster
 */
class GetSimpleInventoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Simple Inventory Model name */
    private $inventoryName;
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
     * @return GetSimpleInventoryModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetSimpleInventoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Simple Inventory Model name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Simple Inventory Model name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Simple Inventory Model name
     * @return GetSimpleInventoryModelMasterRequest
     */
	public function withInventoryName(?string $inventoryName): GetSimpleInventoryModelMasterRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSimpleInventoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSimpleInventoryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
        );
    }
}