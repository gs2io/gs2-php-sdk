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

/**
 * Request for batchComplete: Issue transactions to receive rewards for multiple mission tasks in bulk
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#batchcomplete
 */
class BatchCompleteRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Mission Group Name */
    private $missionGroupName;
    /** @var string User ID */
    private $accessToken;
    /** @var array Task name list */
    private $missionTaskNames;
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
     * @return BatchCompleteRequest
     */
	public function withNamespaceName(?string $namespaceName): BatchCompleteRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Mission Group Name */
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
    /** @param string|null $missionGroupName Mission Group Name */
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
    /**
     * @param string|null $missionGroupName Mission Group Name
     * @return BatchCompleteRequest
     */
	public function withMissionGroupName(?string $missionGroupName): BatchCompleteRequest {
		$this->missionGroupName = $missionGroupName;
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
     * @return BatchCompleteRequest
     */
	public function withAccessToken(?string $accessToken): BatchCompleteRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return array|null Task name list */
	public function getMissionTaskNames(): ?array {
		return $this->missionTaskNames;
	}
    /** @param array|null $missionTaskNames Task name list */
	public function setMissionTaskNames(?array $missionTaskNames) {
		$this->missionTaskNames = $missionTaskNames;
	}
    /**
     * @param array|null $missionTaskNames Task name list
     * @return BatchCompleteRequest
     */
	public function withMissionTaskNames(?array $missionTaskNames): BatchCompleteRequest {
		$this->missionTaskNames = $missionTaskNames;
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
     * @return BatchCompleteRequest
     */
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
            ->withMissionTaskNames(!array_key_exists('missionTaskNames', $data) || $data['missionTaskNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['missionTaskNames']
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
            "missionGroupName" => $this->getMissionGroupName(),
            "accessToken" => $this->getAccessToken(),
            "missionTaskNames" => $this->getMissionTaskNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getMissionTaskNames()
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