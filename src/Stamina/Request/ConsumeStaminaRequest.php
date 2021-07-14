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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class ConsumeStaminaRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $accessToken;
    /** @var int */
    private $consumeValue;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): ConsumeStaminaRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getStaminaName(): ?string {
		return $this->staminaName;
	}

	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}

	public function withStaminaName(?string $staminaName): ConsumeStaminaRequest {
		$this->staminaName = $staminaName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): ConsumeStaminaRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getConsumeValue(): ?int {
		return $this->consumeValue;
	}

	public function setConsumeValue(?int $consumeValue) {
		$this->consumeValue = $consumeValue;
	}

	public function withConsumeValue(?int $consumeValue): ConsumeStaminaRequest {
		$this->consumeValue = $consumeValue;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeStaminaRequest {
        if ($data === null) {
            return null;
        }
        return (new ConsumeStaminaRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withStaminaName(empty($data['staminaName']) ? null : $data['staminaName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withConsumeValue(empty($data['consumeValue']) ? null : $data['consumeValue']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "accessToken" => $this->getAccessToken(),
            "consumeValue" => $this->getConsumeValue(),
        );
    }
}