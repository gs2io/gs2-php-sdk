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

namespace Gs2\LoginReward\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetBonusModelByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $bonusModelName;
    /** @var string */
    private $userId;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetBonusModelByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
	public function withBonusModelName(?string $bonusModelName): GetBonusModelByUserIdRequest {
		$this->bonusModelName = $bonusModelName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GetBonusModelByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBonusModelByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetBonusModelByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBonusModelName(array_key_exists('bonusModelName', $data) && $data['bonusModelName'] !== null ? $data['bonusModelName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "bonusModelName" => $this->getBonusModelName(),
            "userId" => $this->getUserId(),
        );
    }
}