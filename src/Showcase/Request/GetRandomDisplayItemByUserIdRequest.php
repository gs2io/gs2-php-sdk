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

class GetRandomDisplayItemByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $showcaseName;
    /** @var string */
    private $displayItemName;
    /** @var string */
    private $userId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetRandomDisplayItemByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
	public function withShowcaseName(?string $showcaseName): GetRandomDisplayItemByUserIdRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
	public function getDisplayItemName(): ?string {
		return $this->displayItemName;
	}
	public function setDisplayItemName(?string $displayItemName) {
		$this->displayItemName = $displayItemName;
	}
	public function withDisplayItemName(?string $displayItemName): GetRandomDisplayItemByUserIdRequest {
		$this->displayItemName = $displayItemName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GetRandomDisplayItemByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRandomDisplayItemByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetRandomDisplayItemByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withDisplayItemName(array_key_exists('displayItemName', $data) && $data['displayItemName'] !== null ? $data['displayItemName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "displayItemName" => $this->getDisplayItemName(),
            "userId" => $this->getUserId(),
        );
    }
}