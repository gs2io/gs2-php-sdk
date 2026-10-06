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
use Gs2\Enhance\Model\UnleashMaterialSelection;
use Gs2\Enhance\Model\Config;

/**
 * Request for unleashByUserId: Perform unleash by User ID
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashbyuserid
 */
class UnleashByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Enhancement Rate Model name */
    private $rateName;
    /** @var string User ID */
    private $userId;
    /** @var string GRN for the Item Set subject to limit break */
    private $targetItemSetId;
    /** @var array List of materials that break the limit (used when the grade entry type is "Simple") */
    private $materials;
    /** @var string Name of the recipe to use (required when the grade entry type is "Recipe") */
    private $recipeName;
    /** @var array Item sets assigned to each individual material of the recipe (used when the grade entry type is "Recipe") */
    private $recipeMaterials;
    /** @var array Configuration values applied to transaction variables */
    private $config;
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
     * @return UnleashByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): UnleashByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UnleashByUserIdRequest
     */
	public function withRateName(?string $rateName): UnleashByUserIdRequest {
		$this->rateName = $rateName;
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
     * @return UnleashByUserIdRequest
     */
	public function withUserId(?string $userId): UnleashByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null GRN for the Item Set subject to limit break */
	public function getTargetItemSetId(): ?string {
		return $this->targetItemSetId;
	}
    /** @param string|null $targetItemSetId GRN for the Item Set subject to limit break */
	public function setTargetItemSetId(?string $targetItemSetId) {
		$this->targetItemSetId = $targetItemSetId;
	}
    /**
     * @param string|null $targetItemSetId GRN for the Item Set subject to limit break
     * @return UnleashByUserIdRequest
     */
	public function withTargetItemSetId(?string $targetItemSetId): UnleashByUserIdRequest {
		$this->targetItemSetId = $targetItemSetId;
		return $this;
	}
    /** @return array|null List of materials that break the limit (used when the grade entry type is "Simple") */
	public function getMaterials(): ?array {
		return $this->materials;
	}
    /** @param array|null $materials List of materials that break the limit (used when the grade entry type is "Simple") */
	public function setMaterials(?array $materials) {
		$this->materials = $materials;
	}
    /**
     * @param array|null $materials List of materials that break the limit (used when the grade entry type is "Simple")
     * @return UnleashByUserIdRequest
     */
	public function withMaterials(?array $materials): UnleashByUserIdRequest {
		$this->materials = $materials;
		return $this;
	}
    /** @return string|null Name of the recipe to use (required when the grade entry type is "Recipe") */
	public function getRecipeName(): ?string {
		return $this->recipeName;
	}
    /** @param string|null $recipeName Name of the recipe to use (required when the grade entry type is "Recipe") */
	public function setRecipeName(?string $recipeName) {
		$this->recipeName = $recipeName;
	}
    /**
     * @param string|null $recipeName Name of the recipe to use (required when the grade entry type is "Recipe")
     * @return UnleashByUserIdRequest
     */
	public function withRecipeName(?string $recipeName): UnleashByUserIdRequest {
		$this->recipeName = $recipeName;
		return $this;
	}
    /** @return array|null Item sets assigned to each individual material of the recipe (used when the grade entry type is "Recipe") */
	public function getRecipeMaterials(): ?array {
		return $this->recipeMaterials;
	}
    /** @param array|null $recipeMaterials Item sets assigned to each individual material of the recipe (used when the grade entry type is "Recipe") */
	public function setRecipeMaterials(?array $recipeMaterials) {
		$this->recipeMaterials = $recipeMaterials;
	}
    /**
     * @param array|null $recipeMaterials Item sets assigned to each individual material of the recipe (used when the grade entry type is "Recipe")
     * @return UnleashByUserIdRequest
     */
	public function withRecipeMaterials(?array $recipeMaterials): UnleashByUserIdRequest {
		$this->recipeMaterials = $recipeMaterials;
		return $this;
	}
    /** @return array|null Configuration values applied to transaction variables */
	public function getConfig(): ?array {
		return $this->config;
	}
    /** @param array|null $config Configuration values applied to transaction variables */
	public function setConfig(?array $config) {
		$this->config = $config;
	}
    /**
     * @param array|null $config Configuration values applied to transaction variables
     * @return UnleashByUserIdRequest
     */
	public function withConfig(?array $config): UnleashByUserIdRequest {
		$this->config = $config;
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
     * @return UnleashByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UnleashByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UnleashByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UnleashByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetItemSetId(array_key_exists('targetItemSetId', $data) && $data['targetItemSetId'] !== null ? $data['targetItemSetId'] : null)
            ->withMaterials(!array_key_exists('materials', $data) || $data['materials'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['materials']
            ))
            ->withRecipeName(array_key_exists('recipeName', $data) && $data['recipeName'] !== null ? $data['recipeName'] : null)
            ->withRecipeMaterials(!array_key_exists('recipeMaterials', $data) || $data['recipeMaterials'] === null ? null : array_map(
                function ($item) {
                    return UnleashMaterialSelection::fromJson($item);
                },
                $data['recipeMaterials']
            ))
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "userId" => $this->getUserId(),
            "targetItemSetId" => $this->getTargetItemSetId(),
            "materials" => $this->getMaterials() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getMaterials()
            ),
            "recipeName" => $this->getRecipeName(),
            "recipeMaterials" => $this->getRecipeMaterials() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRecipeMaterials()
            ),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}