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
use Gs2\Enhance\Model\Config;

/**
 * Request for directEnhance: Perform enhancements
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#directenhance
 */
class DirectEnhanceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Enhancement Rate Model name */
    private $rateName;
    /** @var string User ID */
    private $accessToken;
    /** @var string GRN of the Item Set to be enhanced */
    private $targetItemSetId;
    /** @var array List of Material */
    private $materials;
    /** @var array Configuration values applied to transaction variables */
    private $config;
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
     * @return DirectEnhanceRequest
     */
	public function withNamespaceName(?string $namespaceName): DirectEnhanceRequest {
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
     * @return DirectEnhanceRequest
     */
	public function withRateName(?string $rateName): DirectEnhanceRequest {
		$this->rateName = $rateName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return DirectEnhanceRequest
     */
	public function withAccessToken(?string $accessToken): DirectEnhanceRequest {
		$this->accessToken = $accessToken;
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
     * @return DirectEnhanceRequest
     */
	public function withTargetItemSetId(?string $targetItemSetId): DirectEnhanceRequest {
		$this->targetItemSetId = $targetItemSetId;
		return $this;
	}
    /** @return array|null List of Material */
	public function getMaterials(): ?array {
		return $this->materials;
	}
    /** @param array|null $materials List of Material */
	public function setMaterials(?array $materials) {
		$this->materials = $materials;
	}
    /**
     * @param array|null $materials List of Material
     * @return DirectEnhanceRequest
     */
	public function withMaterials(?array $materials): DirectEnhanceRequest {
		$this->materials = $materials;
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
     * @return DirectEnhanceRequest
     */
	public function withConfig(?array $config): DirectEnhanceRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DirectEnhanceRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DirectEnhanceRequest {
        if ($data === null) {
            return null;
        }
        return (new DirectEnhanceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTargetItemSetId(array_key_exists('targetItemSetId', $data) && $data['targetItemSetId'] !== null ? $data['targetItemSetId'] : null)
            ->withMaterials(!array_key_exists('materials', $data) || $data['materials'] === null ? null : array_map(
                function ($item) {
                    return Material::fromJson($item);
                },
                $data['materials']
            ))
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "accessToken" => $this->getAccessToken(),
            "targetItemSetId" => $this->getTargetItemSetId(),
            "materials" => $this->getMaterials() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMaterials()
            ),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
        );
    }
}