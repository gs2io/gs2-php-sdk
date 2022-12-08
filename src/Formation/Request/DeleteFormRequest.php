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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteFormRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $moldName;
    /** @var int */
    private $index;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DeleteFormRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): DeleteFormRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getMoldName(): ?string {
		return $this->moldName;
	}
	public function setMoldName(?string $moldName) {
		$this->moldName = $moldName;
	}
	public function withMoldName(?string $moldName): DeleteFormRequest {
		$this->moldName = $moldName;
		return $this;
	}
	public function getIndex(): ?int {
		return $this->index;
	}
	public function setIndex(?int $index) {
		$this->index = $index;
	}
	public function withIndex(?int $index): DeleteFormRequest {
		$this->index = $index;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DeleteFormRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteFormRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteFormRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withMoldName(array_key_exists('moldName', $data) && $data['moldName'] !== null ? $data['moldName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "moldName" => $this->getMoldName(),
            "index" => $this->getIndex(),
        );
    }
}