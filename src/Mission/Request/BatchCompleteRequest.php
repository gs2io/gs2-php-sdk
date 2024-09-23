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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Mission\Model\Config;

class BatchCompleteRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $missionGroupName;
    /** @var string */
    private $accessToken;
    /** @var array */
    private $missionTaskNames;
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
	public function withNamespaceName(?string $namespaceName): BatchCompleteRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
	public function withMissionGroupName(?string $missionGroupName): BatchCompleteRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): BatchCompleteRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getMissionTaskNames(): ?array {
		return $this->missionTaskNames;
	}
	public function setMissionTaskNames(?array $missionTaskNames) {
		$this->missionTaskNames = $missionTaskNames;
	}
	public function withMissionTaskNames(?array $missionTaskNames): BatchCompleteRequest {
		$this->missionTaskNames = $missionTaskNames;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): BatchCompleteRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): BatchCompleteRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchCompleteRequest {
        if ($data === null) {
            return null;
        }
        return (new BatchCompleteRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withMissionTaskNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('missionTaskNames', $data) && $data['missionTaskNames'] !== null ? $data['missionTaskNames'] : []
            ))
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
            "missionGroupName" => $this->getMissionGroupName(),
            "accessToken" => $this->getAccessToken(),
            "missionTaskNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getMissionTaskNames() !== null && $this->getMissionTaskNames() !== null ? $this->getMissionTaskNames() : []
            ),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}