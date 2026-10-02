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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for markRestrain: Revert a node to unreleased state
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#markrestrain
 */
class MarkRestrainRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Property ID */
    private $propertyId;
    /** @var array List of node model names */
    private $nodeModelNames;
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
     * @return MarkRestrainRequest
     */
	public function withNamespaceName(?string $namespaceName): MarkRestrainRequest {
		$this->namespaceName = $namespaceName;
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
     * @return MarkRestrainRequest
     */
	public function withAccessToken(?string $accessToken): MarkRestrainRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return MarkRestrainRequest
     */
	public function withPropertyId(?string $propertyId): MarkRestrainRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null List of node model names */
	public function getNodeModelNames(): ?array {
		return $this->nodeModelNames;
	}
    /** @param array|null $nodeModelNames List of node model names */
	public function setNodeModelNames(?array $nodeModelNames) {
		$this->nodeModelNames = $nodeModelNames;
	}
    /**
     * @param array|null $nodeModelNames List of node model names
     * @return MarkRestrainRequest
     */
	public function withNodeModelNames(?array $nodeModelNames): MarkRestrainRequest {
		$this->nodeModelNames = $nodeModelNames;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): MarkRestrainRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?MarkRestrainRequest {
        if ($data === null) {
            return null;
        }
        return (new MarkRestrainRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withNodeModelNames(!array_key_exists('nodeModelNames', $data) || $data['nodeModelNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['nodeModelNames']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "propertyId" => $this->getPropertyId(),
            "nodeModelNames" => $this->getNodeModelNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getNodeModelNames()
            ),
        );
    }
}