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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for runVerifyTask: Execute verify action of transaction
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#runverifytask
 */
class RunVerifyTaskRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Verify Action */
    private $verifyTask;
    /** @var string Encryption Key GRN */
    private $keyId;
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
     * @return RunVerifyTaskRequest
     */
	public function withNamespaceName(?string $namespaceName): RunVerifyTaskRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Verify Action */
	public function getVerifyTask(): ?string {
		return $this->verifyTask;
	}
    /** @param string|null $verifyTask Verify Action */
	public function setVerifyTask(?string $verifyTask) {
		$this->verifyTask = $verifyTask;
	}
    /**
     * @param string|null $verifyTask Verify Action
     * @return RunVerifyTaskRequest
     */
	public function withVerifyTask(?string $verifyTask): RunVerifyTaskRequest {
		$this->verifyTask = $verifyTask;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return RunVerifyTaskRequest
     */
	public function withKeyId(?string $keyId): RunVerifyTaskRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?RunVerifyTaskRequest {
        if ($data === null) {
            return null;
        }
        return (new RunVerifyTaskRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withVerifyTask(array_key_exists('verifyTask', $data) && $data['verifyTask'] !== null ? $data['verifyTask'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "verifyTask" => $this->getVerifyTask(),
            "keyId" => $this->getKeyId(),
        );
    }
}