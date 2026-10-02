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
 * Request for incrementPurchaseCount: Increment the number of times a Random Displayed Item has been purchased
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#incrementpurchasecount
 */
class IncrementPurchaseCountRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Random Showcase Name */
    private $showcaseName;
    /** @var string Number of Random Displayed Item purchases name */
    private $displayItemName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Number of purchase times to add */
    private $count;
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
     * @return IncrementPurchaseCountRequest
     */
	public function withNamespaceName(?string $namespaceName): IncrementPurchaseCountRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Random Showcase Name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Random Showcase Name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Random Showcase Name
     * @return IncrementPurchaseCountRequest
     */
	public function withShowcaseName(?string $showcaseName): IncrementPurchaseCountRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null Number of Random Displayed Item purchases name */
	public function getDisplayItemName(): ?string {
		return $this->displayItemName;
	}
    /** @param string|null $displayItemName Number of Random Displayed Item purchases name */
	public function setDisplayItemName(?string $displayItemName) {
		$this->displayItemName = $displayItemName;
	}
    /**
     * @param string|null $displayItemName Number of Random Displayed Item purchases name
     * @return IncrementPurchaseCountRequest
     */
	public function withDisplayItemName(?string $displayItemName): IncrementPurchaseCountRequest {
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
     * @return IncrementPurchaseCountRequest
     */
	public function withAccessToken(?string $accessToken): IncrementPurchaseCountRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Number of purchase times to add */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of purchase times to add */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of purchase times to add
     * @return IncrementPurchaseCountRequest
     */
	public function withCount(?int $count): IncrementPurchaseCountRequest {
		$this->count = $count;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): IncrementPurchaseCountRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?IncrementPurchaseCountRequest {
        if ($data === null) {
            return null;
        }
        return (new IncrementPurchaseCountRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withDisplayItemName(array_key_exists('displayItemName', $data) && $data['displayItemName'] !== null ? $data['displayItemName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "displayItemName" => $this->getDisplayItemName(),
            "accessToken" => $this->getAccessToken(),
            "count" => $this->getCount(),
        );
    }
}