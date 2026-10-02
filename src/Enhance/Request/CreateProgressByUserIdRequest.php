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

/**
 * Request for createProgressByUserId: Start enhancement by User ID
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#createprogressbyuserid
 */
class CreateProgressByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Enhancement Rate Model name */
    private $rateName;
    /** @var string GRN of the Item Set to be enhanced */
    private $targetItemSetId;
    /** @var array List of materials */
    private $materials;
    /** @var bool If there is an enhancement that has already been started, it can be discarded and started, or */
    private $force;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
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
     * @return CreateProgressByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateProgressByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return CreateProgressByUserIdRequest
     */
	public function withUserId(?string $userId): CreateProgressByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Enhancement Rate Model name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Enhancement Rate Model name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Enhancement Rate Model name
     * @return CreateProgressByUserIdRequest
     */
	public function withRateName(?string $rateName): CreateProgressByUserIdRequest {
		$this->rateName = $rateName;
		return $this;
	}
    /** @return string|null GRN of the Item Set to be enhanced */
	public function getTargetItemSetId(): ?string {
		return $this->targetItemSetId;
	}
    /** @param string|null $targetItemSetId GRN of the Item Set to be enhanced */
	public function setTargetItemSetId(?string $targetItemSetId) {
		$this->targetItemSetId = $targetItemSetId;
	}
    /**
     * @param string|null $targetItemSetId GRN of the Item Set to be enhanced
     * @return CreateProgressByUserIdRequest
     */
	public function withTargetItemSetId(?string $targetItemSetId): CreateProgressByUserIdRequest {
		$this->targetItemSetId = $targetItemSetId;
		return $this;
	}
    /** @return array|null List of materials */
	public function getMaterials(): ?array {
		return $this->materials;
	}
    /** @param array|null $materials List of materials */
	public function setMaterials(?array $materials) {
		$this->materials = $materials;
	}
    /**
     * @param array|null $materials List of materials
     * @return CreateProgressByUserIdRequest
     */
	public function withMaterials(?array $materials): CreateProgressByUserIdRequest {
		$this->materials = $materials;
		return $this;
	}
    /** @return bool|null If there is an enhancement that has already been started, it can be discarded and started, or */
	public function getForce(): ?bool {
		return $this->force;
	}
    /** @param bool|null $force If there is an enhancement that has already been started, it can be discarded and started, or */
	public function setForce(?bool $force) {
		$this->force = $force;
	}
    /**
     * @param bool|null $force If there is an enhancement that has already been started, it can be discarded and started, or
     * @return CreateProgressByUserIdRequest
     */
	public function withForce(?bool $force): CreateProgressByUserIdRequest {
		$this->force = $force;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return CreateProgressByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): CreateProgressByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
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
            ->withMaterials(!array_key_exists('materials', $data) || $data['materials'] === null ? null : array_map(
                function ($item) {
                    return Material::fromJson($item);
                },
                $data['materials']
            ))
            ->withForce(array_key_exists('force', $data) ? $data['force'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "targetItemSetId" => $this->getTargetItemSetId(),
            "materials" => $this->getMaterials() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMaterials()
            ),
            "force" => $this->getForce(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}