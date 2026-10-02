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

/**
 * Request for evaluateComplete: Re-evaluate Completion Status
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#evaluatecomplete
 */
class EvaluateCompleteRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Mission Group Name */
    private $missionGroupName;
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
     * @return EvaluateCompleteRequest
     */
	public function withNamespaceName(?string $namespaceName): EvaluateCompleteRequest {
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
     * @return EvaluateCompleteRequest
     */
	public function withAccessToken(?string $accessToken): EvaluateCompleteRequest {
		$this->accessToken = $accessToken;
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
     * @return EvaluateCompleteRequest
     */
	public function withMissionGroupName(?string $missionGroupName): EvaluateCompleteRequest {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): EvaluateCompleteRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?EvaluateCompleteRequest {
        if ($data === null) {
            return null;
        }
        return (new EvaluateCompleteRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "missionGroupName" => $this->getMissionGroupName(),
        );
    }
}