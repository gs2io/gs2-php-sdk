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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\Material;

class CreateProgressByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $rateName;
    /** @var string */
    private $targetItemSetId;
    /** @var array */
    private $materials;
    /** @var bool */
    private $force;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateProgressByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): CreateProgressByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getRateName(): ?string {
		return $this->rateName;
	}
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
	public function withRateName(?string $rateName): CreateProgressByUserIdRequest {
		$this->rateName = $rateName;
		return $this;
	}
	public function getTargetItemSetId(): ?string {
		return $this->targetItemSetId;
	}
	public function setTargetItemSetId(?string $targetItemSetId) {
		$this->targetItemSetId = $targetItemSetId;
	}
	public function withTargetItemSetId(?string $targetItemSetId): CreateProgressByUserIdRequest {
		$this->targetItemSetId = $targetItemSetId;
		return $this;
	}
	public function getMaterials(): ?array {
		return $this->materials;
	}
	public function setMaterials(?array $materials) {
		$this->materials = $materials;
	}
	public function withMaterials(?array $materials): CreateProgressByUserIdRequest {
		$this->materials = $materials;
		return $this;
	}
	public function getForce(): ?bool {
		return $this->force;
	}
	public function setForce(?bool $force) {
		$this->force = $force;
	}
	public function withForce(?bool $force): CreateProgressByUserIdRequest {
		$this->force = $force;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateProgressByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateProgressByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateProgressByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withTargetItemSetId(array_key_exists('targetItemSetId', $data) && $data['targetItemSetId'] !== null ? $data['targetItemSetId'] : null)
            ->withMaterials(array_map(
                function ($item) {
                    return Material::fromJson($item);
                },
                array_key_exists('materials', $data) && $data['materials'] !== null ? $data['materials'] : []
            ))
            ->withForce(array_key_exists('force', $data) ? $data['force'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "targetItemSetId" => $this->getTargetItemSetId(),
            "materials" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMaterials() !== null && $this->getMaterials() !== null ? $this->getMaterials() : []
            ),
            "force" => $this->getForce(),
        );
    }
}