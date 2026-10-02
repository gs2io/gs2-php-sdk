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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for cancelMatchmaking: Cancel Matchmaking
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#cancelmatchmaking
 */
class CancelMatchmakingRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Gathering name */
    private $gatheringName;
    /** @var string User ID */
    private $accessToken;
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
     * @return CancelMatchmakingRequest
     */
	public function withNamespaceName(?string $namespaceName): CancelMatchmakingRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Gathering name */
	public function getGatheringName(): ?string {
		return $this->gatheringName;
	}
    /** @param string|null $gatheringName Gathering name */
	public function setGatheringName(?string $gatheringName) {
		$this->gatheringName = $gatheringName;
	}
    /**
     * @param string|null $gatheringName Gathering name
     * @return CancelMatchmakingRequest
     */
	public function withGatheringName(?string $gatheringName): CancelMatchmakingRequest {
		$this->gatheringName = $gatheringName;
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
     * @return CancelMatchmakingRequest
     */
	public function withAccessToken(?string $accessToken): CancelMatchmakingRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CancelMatchmakingRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CancelMatchmakingRequest {
        if ($data === null) {
            return null;
        }
        return (new CancelMatchmakingRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGatheringName(array_key_exists('gatheringName', $data) && $data['gatheringName'] !== null ? $data['gatheringName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "gatheringName" => $this->getGatheringName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}