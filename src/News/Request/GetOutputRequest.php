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

namespace Gs2\News\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getOutput: Get output of content generation progress
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#getoutput
 */
class GetOutputRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Upload Token */
    private $uploadToken;
    /** @var string Output Name */
    private $outputName;
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
     * @return GetOutputRequest
     */
	public function withNamespaceName(?string $namespaceName): GetOutputRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Upload Token */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
    /** @param string|null $uploadToken Upload Token */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
    /**
     * @param string|null $uploadToken Upload Token
     * @return GetOutputRequest
     */
	public function withUploadToken(?string $uploadToken): GetOutputRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}
    /** @return string|null Output Name */
	public function getOutputName(): ?string {
		return $this->outputName;
	}
    /** @param string|null $outputName Output Name */
	public function setOutputName(?string $outputName) {
		$this->outputName = $outputName;
	}
    /**
     * @param string|null $outputName Output Name
     * @return GetOutputRequest
     */
	public function withOutputName(?string $outputName): GetOutputRequest {
		$this->outputName = $outputName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetOutputRequest {
        if ($data === null) {
            return null;
        }
        return (new GetOutputRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null)
            ->withOutputName(array_key_exists('outputName', $data) && $data['outputName'] !== null ? $data['outputName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "uploadToken" => $this->getUploadToken(),
            "outputName" => $this->getOutputName(),
        );
    }
}