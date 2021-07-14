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

namespace Gs2\Key\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DecryptRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $keyName;
    /** @var string */
    private $data;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DecryptRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getKeyName(): ?string {
		return $this->keyName;
	}

	public function setKeyName(?string $keyName) {
		$this->keyName = $keyName;
	}

	public function withKeyName(?string $keyName): DecryptRequest {
		$this->keyName = $keyName;
		return $this;
	}

	public function getData(): ?string {
		return $this->data;
	}

	public function setData(?string $data) {
		$this->data = $data;
	}

	public function withData(?string $data): DecryptRequest {
		$this->data = $data;
		return $this;
	}

    public static function fromJson(?array $data): ?DecryptRequest {
        if ($data === null) {
            return null;
        }
        return (new DecryptRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withKeyName(empty($data['keyName']) ? null : $data['keyName'])
            ->withData(empty($data['data']) ? null : $data['data']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "keyName" => $this->getKeyName(),
            "data" => $this->getData(),
        );
    }
}