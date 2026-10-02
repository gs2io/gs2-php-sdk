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

namespace Gs2\StateMachine\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for exitStateMachine: Exit and delete state machine
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#exitstatemachine
 */
class ExitStateMachineRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Status name */
    private $statusName;
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
     * @return ExitStateMachineRequest
     */
	public function withNamespaceName(?string $namespaceName): ExitStateMachineRequest {
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
     * @return ExitStateMachineRequest
     */
	public function withAccessToken(?string $accessToken): ExitStateMachineRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Status name */
	public function getStatusName(): ?string {
		return $this->statusName;
	}
    /** @param string|null $statusName Status name */
	public function setStatusName(?string $statusName) {
		$this->statusName = $statusName;
	}
    /**
     * @param string|null $statusName Status name
     * @return ExitStateMachineRequest
     */
	public function withStatusName(?string $statusName): ExitStateMachineRequest {
		$this->statusName = $statusName;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ExitStateMachineRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ExitStateMachineRequest {
        if ($data === null) {
            return null;
        }
        return (new ExitStateMachineRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withStatusName(array_key_exists('statusName', $data) && $data['statusName'] !== null ? $data['statusName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "statusName" => $this->getStatusName(),
        );
    }
}