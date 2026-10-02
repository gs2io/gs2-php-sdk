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
 * Request for getRandomDisplayItem: Get Random Displayed Item on Random Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#getrandomdisplayitem
 */
class GetRandomDisplayItemRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Random Showcase name */
    private $showcaseName;
    /** @var string Random Displayed Item name */
    private $displayItemName;
    /** @var string User ID */
    private $accessToken;
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
     * @return GetRandomDisplayItemRequest
     */
	public function withNamespaceName(?string $namespaceName): GetRandomDisplayItemRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Random Showcase name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Random Showcase name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Random Showcase name
     * @return GetRandomDisplayItemRequest
     */
	public function withShowcaseName(?string $showcaseName): GetRandomDisplayItemRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null Random Displayed Item name */
	public function getDisplayItemName(): ?string {
		return $this->displayItemName;
	}
    /** @param string|null $displayItemName Random Displayed Item name */
	public function setDisplayItemName(?string $displayItemName) {
		$this->displayItemName = $displayItemName;
	}
    /**
     * @param string|null $displayItemName Random Displayed Item name
     * @return GetRandomDisplayItemRequest
     */
	public function withDisplayItemName(?string $displayItemName): GetRandomDisplayItemRequest {
		$this->displayItemName = $displayItemName;
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
     * @return GetRandomDisplayItemRequest
     */
	public function withAccessToken(?string $accessToken): GetRandomDisplayItemRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRandomDisplayItemRequest {
        if ($data === null) {
            return null;
        }
        return (new GetRandomDisplayItemRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withDisplayItemName(array_key_exists('displayItemName', $data) && $data['displayItemName'] !== null ? $data['displayItemName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "displayItemName" => $this->getDisplayItemName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}