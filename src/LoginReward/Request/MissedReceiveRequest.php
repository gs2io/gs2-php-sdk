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
use Gs2\LoginReward\Model\Config;

class MissedReceiveRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $bonusModelName;
    /** @var string */
    private $accessToken;
    /** @var int */
    private $stepNumber;
    /** @var array */
    private $config;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): MissedReceiveRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
	public function withBonusModelName(?string $bonusModelName): MissedReceiveRequest {
		$this->bonusModelName = $bonusModelName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): MissedReceiveRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getStepNumber(): ?int {
		return $this->stepNumber;
	}
	public function setStepNumber(?int $stepNumber) {
		$this->stepNumber = $stepNumber;
	}
	public function withStepNumber(?int $stepNumber): MissedReceiveRequest {
		$this->stepNumber = $stepNumber;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): MissedReceiveRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): MissedReceiveRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?MissedReceiveRequest {
        if ($data === null) {
            return null;
        }
        return (new MissedReceiveRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBonusModelName(array_key_exists('bonusModelName', $data) && $data['bonusModelName'] !== null ? $data['bonusModelName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withStepNumber(array_key_exists('stepNumber', $data) && $data['stepNumber'] !== null ? $data['stepNumber'] : null)
            ->withConfig(array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                array_key_exists('config', $data) && $data['config'] !== null ? $data['config'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "bonusModelName" => $this->getBonusModelName(),
            "accessToken" => $this->getAccessToken(),
            "stepNumber" => $this->getStepNumber(),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}