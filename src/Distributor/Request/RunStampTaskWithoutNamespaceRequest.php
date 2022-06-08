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

class RunStampTaskWithoutNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $stampTask;
    /** @var string */
    private $keyId;
	public function getStampTask(): ?string {
		return $this->stampTask;
	}
	public function setStampTask(?string $stampTask) {
		$this->stampTask = $stampTask;
	}
	public function withStampTask(?string $stampTask): RunStampTaskWithoutNamespaceRequest {
		$this->stampTask = $stampTask;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): RunStampTaskWithoutNamespaceRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?RunStampTaskWithoutNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new RunStampTaskWithoutNamespaceRequest())
            ->withStampTask(array_key_exists('stampTask', $data) && $data['stampTask'] !== null ? $data['stampTask'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "stampTask" => $this->getStampTask(),
            "keyId" => $this->getKeyId(),
        );
    }
}