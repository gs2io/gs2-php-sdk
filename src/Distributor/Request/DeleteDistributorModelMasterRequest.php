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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteDistributorModelMaster: Delete Distributor Model Master
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#deletedistributormodelmaster
 */
class DeleteDistributorModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Distributor Model name */
    private $distributorName;
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
     * @return DeleteDistributorModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteDistributorModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Distributor Model name */
	public function getDistributorName(): ?string {
		return $this->distributorName;
	}
    /** @param string|null $distributorName Distributor Model name */
	public function setDistributorName(?string $distributorName) {
		$this->distributorName = $distributorName;
	}
    /**
     * @param string|null $distributorName Distributor Model name
     * @return DeleteDistributorModelMasterRequest
     */
	public function withDistributorName(?string $distributorName): DeleteDistributorModelMasterRequest {
		$this->distributorName = $distributorName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteDistributorModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteDistributorModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDistributorName(array_key_exists('distributorName', $data) && $data['distributorName'] !== null ? $data['distributorName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "distributorName" => $this->getDistributorName(),
        );
    }
}