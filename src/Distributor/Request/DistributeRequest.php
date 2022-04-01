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
use Gs2\Distributor\Model\DistributeResource;

class DistributeRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $distributorName;
    /** @var string */
    private $userId;
    /** @var DistributeResource */
    private $distributeResource;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DistributeRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getDistributorName(): ?string {
		return $this->distributorName;
	}

	public function setDistributorName(?string $distributorName) {
		$this->distributorName = $distributorName;
	}

	public function withDistributorName(?string $distributorName): DistributeRequest {
		$this->distributorName = $distributorName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DistributeRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getDistributeResource(): ?DistributeResource {
		return $this->distributeResource;
	}

	public function setDistributeResource(?DistributeResource $distributeResource) {
		$this->distributeResource = $distributeResource;
	}

	public function withDistributeResource(?DistributeResource $distributeResource): DistributeRequest {
		$this->distributeResource = $distributeResource;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributeRequest {
        if ($data === null) {
            return null;
        }
        return (new DistributeRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDistributorName(array_key_exists('distributorName', $data) && $data['distributorName'] !== null ? $data['distributorName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDistributeResource(array_key_exists('distributeResource', $data) && $data['distributeResource'] !== null ? DistributeResource::fromJson($data['distributeResource']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "distributorName" => $this->getDistributorName(),
            "userId" => $this->getUserId(),
            "distributeResource" => $this->getDistributeResource() !== null ? $this->getDistributeResource()->toJson() : null,
        );
    }
}