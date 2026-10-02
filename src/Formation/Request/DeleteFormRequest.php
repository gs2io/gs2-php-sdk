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

/**
 * Request for deleteForm: Delete form
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#deleteform
 */
class DeleteFormRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Form Storage Area Model name */
    private $moldModelName;
    /** @var int Index of form */
    private $index;
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
     * @return DeleteFormRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteFormRequest {
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
     * @return DeleteFormRequest
     */
	public function withAccessToken(?string $accessToken): DeleteFormRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
    /** @param string|null $moldModelName Form Storage Area Model name */
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
    /**
     * @param string|null $moldModelName Form Storage Area Model name
     * @return DeleteFormRequest
     */
	public function withMoldModelName(?string $moldModelName): DeleteFormRequest {
		$this->moldModelName = $moldModelName;
		return $this;
	}
    /** @return int|null Index of form */
	public function getIndex(): ?int {
		return $this->index;
	}
    /** @param int|null $index Index of form */
	public function setIndex(?int $index) {
		$this->index = $index;
	}
    /**
     * @param int|null $index Index of form
     * @return DeleteFormRequest
     */
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
            ->withMoldModelName(array_key_exists('moldModelName', $data) && $data['moldModelName'] !== null ? $data['moldModelName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "moldModelName" => $this->getMoldModelName(),
            "index" => $this->getIndex(),
        );
    }
}