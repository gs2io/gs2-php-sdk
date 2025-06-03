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

namespace Gs2\Freeze\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetOutputRequest extends Gs2BasicRequest {
    /** @var string */
    private $stageName;
    /** @var string */
    private $outputName;
	public function getStageName(): ?string {
		return $this->stageName;
	}
	public function setStageName(?string $stageName) {
		$this->stageName = $stageName;
	}
	public function withStageName(?string $stageName): GetOutputRequest {
		$this->stageName = $stageName;
		return $this;
	}
	public function getOutputName(): ?string {
		return $this->outputName;
	}
	public function setOutputName(?string $outputName) {
		$this->outputName = $outputName;
	}
	public function withOutputName(?string $outputName): GetOutputRequest {
		$this->outputName = $outputName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetOutputRequest {
        if ($data === null) {
            return null;
        }
        return (new GetOutputRequest())
            ->withStageName(array_key_exists('stageName', $data) && $data['stageName'] !== null ? $data['stageName'] : null)
            ->withOutputName(array_key_exists('outputName', $data) && $data['outputName'] !== null ? $data['outputName'] : null);
    }

    public function toJson(): array {
        return array(
            "stageName" => $this->getStageName(),
            "outputName" => $this->getOutputName(),
        );
    }
}