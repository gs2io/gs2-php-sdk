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

/**
 * Request for missedReceive: Receive missed login rewards
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#missedreceive
 */
class MissedReceiveRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Login Bonus Model name */
    private $bonusModelName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Step number to receive. In streaming mode, this can be omitted */
    private $stepNumber;
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
     * @return MissedReceiveRequest
     */
	public function withNamespaceName(?string $namespaceName): MissedReceiveRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Login Bonus Model name */
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
    /** @param string|null $bonusModelName Login Bonus Model name */
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
    /**
     * @param string|null $bonusModelName Login Bonus Model name
     * @return MissedReceiveRequest
     */
	public function withBonusModelName(?string $bonusModelName): MissedReceiveRequest {
		$this->bonusModelName = $bonusModelName;
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
     * @return MissedReceiveRequest
     */
	public function withAccessToken(?string $accessToken): MissedReceiveRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Step number to receive. In streaming mode, this can be omitted */
	public function getStepNumber(): ?int {
		return $this->stepNumber;
	}
    /** @param int|null $stepNumber Step number to receive. In streaming mode, this can be omitted */
	public function setStepNumber(?int $stepNumber) {
		$this->stepNumber = $stepNumber;
	}
    /**
     * @param int|null $stepNumber Step number to receive. In streaming mode, this can be omitted
     * @return MissedReceiveRequest
     */
	public function withStepNumber(?int $stepNumber): MissedReceiveRequest {
		$this->stepNumber = $stepNumber;
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
     * @return MissedReceiveRequest
     */
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
            "bonusModelName" => $this->getBonusModelName(),
            "accessToken" => $this->getAccessToken(),
            "stepNumber" => $this->getStepNumber(),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
        );
    }
}